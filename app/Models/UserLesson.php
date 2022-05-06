<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class UserLesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'progress',
    ];

    public static function sumProgress($data)
    {

        return (($data['programLesson'] / $data['sumDocument']) * config('lesson.one_hundreds')) + $data['progressLesson'];
    }
}
