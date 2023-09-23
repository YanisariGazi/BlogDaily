<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Blameable;
    protected $guarded = ['id'];
    // protected $fillable = [
    // user_id
    // title
    // slug
    // summary
    // content
    // heroImage
    // view_count
    // status
    // categorie_id
    // forSearch
    // ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
