<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentPost extends Model
{
    use Blameable;
    // protected $guarded = ['id'];
    protected $fillable = [
    'user_id',
    'post_id',
    'parent_id',
    'content'
    ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
