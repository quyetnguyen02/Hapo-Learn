<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'thumbnail',
        'type',
        'link',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_documents', 'document_id', 'user_id')->withTimestamps();
    }

    public function getDocumentByUserIdAttribute()
    {
        return $this->users()->where('user_id', Auth::user()->id)->count();
    }
}
