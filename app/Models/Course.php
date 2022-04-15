<?php

namespace App\Models;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
    ];

    /**
     * @var mixed
     */

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'course_id', 'tag_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    public function getLearnersAttribute()
    {
        return number_format($this->users()->count());
    }

    public function getLessonsCountAttribute()
    {
        return number_format($this->lessons()->count());
    }

    public function getTimeSumAttribute()
    {
        return number_format($this->lessons()->sum('time')) . " " . "(h)";
    }

    public function scopeSearch($query, $request)
    {
        if (isset($request['keyword'])) {
            $query->where('name', 'LIKE', '%' . $request['keyword'] . '%')
                ->orWhere('description', 'LIKE', '%' . $request['keyword'] . '%');
        }

        if (isset($request['created_time'])) {
            $query->orderBy('id', $request['created_time']);
        }

        if (isset($request['teacher'])) {

            $query->whereHas('teachers', function ($subquery) use ($request) {
                $subquery->where('user_id', $request['teacher']);
            });
        }

        if (isset($request['learner'])) {
            $query->withCount('users')->orderBy('users_count', $request['learner']);
        }

        if (isset($request['learn_time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $request['learn_time']);
        }

        if (isset($request['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $request['lesson']);
        }

        if (isset($request['tag'])) {
            $tag = $request['tag'];
            $query->whereHas('tags', function ($subquery) use ($tag) {
                $subquery->where('tag_id', $tag);
            });
        }
        $query->orderBy('id', config('filter.sort.desc'));
        return $query;
    }
}
