<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequisitionsDetail extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'pr_id',
        'item_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    public function purchaseRequisition()
    {
        return $this->belongsTo(User::class, 'pr_id', 'id');
    }


}
