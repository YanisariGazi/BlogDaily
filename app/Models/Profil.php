<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use Blameable;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'user_id',
    //     'avatar',
    //     'bio',
    //     'tgl_lahir',
    //     'jenis_kelamin',
    //     'tgl_bergabung',
    //     'sosmed',
    // ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

}
