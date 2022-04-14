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

        if (!is_null($request->search_new_old) && isset($request->search_new_old)) {
            $query->orderBy('id', $request->search_new_old);
        }

        if (!is_null($request->search_teacher) && isset($request->search_teacher)) {
            $search_teacher = $request->search_teacher;
            $query->whereHas('teachers', function ($subquery) use ($search_teacher) {
                $subquery->where('user_id', $search_teacher);
            });
        }

        if (!is_null($request->search_learner) && ($request->search_learner)) {
            $query->withCount('users')->orderBy('users_count', $request->search_learner);
        }

        if (!is_null($request->search_time) && isset($request->search_time)) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $request->search_time);
        }

        if (!is_null($request->search_lesson) && isset($request->search_lesson)) {
            $query->withCount('lessons')->orderBy('lessons_count', $request->search_lesson);
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
