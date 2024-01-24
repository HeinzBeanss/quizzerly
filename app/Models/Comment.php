<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
