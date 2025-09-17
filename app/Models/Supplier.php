<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        'nameSupplier', 
        'contact_person', 
        'phone',
        'email', 
        'address',
        'description',
    ];
}
