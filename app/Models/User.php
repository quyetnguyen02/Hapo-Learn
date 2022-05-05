<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    const ROLE_USER = 0;
    const ROLE_TEACHER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'job',
        'phone',
        'role',
        'avatar',
        'birthday',
        'description',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacherCourses()
    {
        return $this->belongsToMany(Course::class, 'teacher_courses', 'user_id', 'course_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses', 'user_id', 'course_id')->withPivot('status')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons', 'user_id', 'lesson_id')->withPivot('progress')->withTimestamps();
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'user_documents', 'user_id', 'document_id')->withTimestamps();
    }

    public function statusCourse($data)
    {
        return $this->courses()->where('course_id', $data)->pluck('status')->first();
    }

    public function progressLesson($data)
    {
        return $this->lessons()->where('lesson_id', $data)->pluck('progress')->first();
    }

    public function getCourseUser($data)
    {
        return $this->courses()->where('course_id', $data)->count();
    }

    public function scopeTeacher($query)
    {
        return $query->where('role', '=', User::ROLE_TEACHER);
    }
}
