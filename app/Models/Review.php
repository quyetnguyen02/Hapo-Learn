<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'content',
        'vote',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
