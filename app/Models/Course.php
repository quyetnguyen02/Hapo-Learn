<?php

namespace App\Models;

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

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasMany
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
        return number_format($this->lessons()->sum('time')) . " " .  "(h)";
    }

    public function scopeSearch($query, $request)
    {
        if (!is_null($request->key) && isset($request->key)) {
            $query->where('name', 'LIKE' , '%' . $request->key . '%')
                ->orWhere('description','LIKE','%'. $request->key .'%');
        }

        if (isset($request->searchNewOld)) {
            $query->orderBy('id', $request->searchNewOld);
        }

        if (!is_null($request->searchTeacher) && isset($request->searchTeacher)) {
            $searchTeacher = $request->searchTeacher;
            $query->whereHas('teachers', function ($subquery) use ($searchTeacher) {
                $subquery->where('user_id', searchTeacher);
            });
        }

        if (!is_null($request->searchLearner) && isset($request->searchLearner)) {
            $query->withCount('users')->orderBy('users_count', $request->searchLearner);
        }

        if (!is_null($request->searchTime) && isset($request->searchTime)) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $request->searchTime);
        }

        if (!is_null($request->searchLesson) && isset($request->searchLesson)) {
            $query->withCount('lessons')->orderBy('lessons_count', $request->searchLesson);
        }

        if (!is_null($request->tag) && isset($request->tag)) {
            $tag = $request->tag;
            $query->whereHas('tags', function ($subquery) use ($tag) {
                $subquery->where('tag_id', $tag);
            });
        }
        $query->orderBy('id', config('filter.sort.desc'));
         return $query;
    }
}
