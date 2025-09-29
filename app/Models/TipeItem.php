<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeItem extends Model
{
    use  SoftDeletes;


    protected $fillable=[
        'kodeTipe',
        'nameTipe',
        'description',
    ];

}
