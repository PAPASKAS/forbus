<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'questions_id',
        'login',
        'comment',
        'created_at',
        'updated_at'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function question () {
        return $this->belongsTo(Questions::class);
    }
}
