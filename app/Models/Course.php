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

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'LIKE', '%' . $data['keyword'] . '%')
                ->orWhere('description', 'LIKE', '%' . $data['keyword'] . '%');
        }

        if (isset($data['created_time'])) {
            $query->orderBy('created_at', $data['created_time']);
        } else {
            $query->orderBy('id', config('filter.sort.desc'));
        }

        if (isset($data['teacher'])) {
            $query->whereHas('teachers', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['learn_time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data['learn_time']);
        }

        if (isset($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tag'])) {
            $tag = $data['tag'];
            $query->whereHas('tags', function ($subquery) use ($tag) {
                $subquery->where('tag_id', $tag);
            });
        }

        return $query;
    }
}
