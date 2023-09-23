<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriPost extends Model
{
    use Blameable;
    // protected $guarded = ['id'];
    protected $fillable = [
    'titleName',
    'slug'
    ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
