<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequisitions extends Model
{
    protected $fillable =[
        'title', 
        'description', 
        'requested_by_user_id',
        'status',  
        'total_amount',

    ];
}
