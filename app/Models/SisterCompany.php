<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SisterCompany extends Model
{
    protected $fillable=[
        'code',
        'name',
        'picUser',
        'tlp',
        'email',
        'address',
        'description',
    ];

}
