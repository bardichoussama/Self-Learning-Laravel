<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
  
}
