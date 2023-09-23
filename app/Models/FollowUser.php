<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUser extends Model
{
    use Blameable;
    // protected $guarded = ['id'];
    protected $fillable = [
    'user_id',
    'followed_id'
    ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
