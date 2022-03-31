<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function course(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasOne(Course::class, 'course_id', 'id');
    }

    public function document(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document::class, 'lesson_id', 'id');
    }

    public function lesson(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'lesson_id', 'user_id');
    }
}
