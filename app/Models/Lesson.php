<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'content',
        'description',
        'time',
        'requirements'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->withTimestamps();
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'lesson_id', 'user_id')->withPivot('progress')->withTimestamps();
    }

    public function scopeLessonsForCourse($query, $data, $id)
    {
        $query->where('course_id', $id)->orderby('created_at', config('filter.sort.asc'));
        if (isset($data['keyword'])) {
            $query->where('title', 'LIKE', '%' .  $data['keyword'] . '%');
        }
        return $query;
    }

    public function getLearningProgressAttribute()
    {
        return number_format($this->users()->where('user_id', Auth::user()->id)->pluck('progress')->first(), 1);
    }

    public function getLessonByUserIdAttribute()
    {
        return $this->users()->count();
    }
}
