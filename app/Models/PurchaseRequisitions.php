<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequisitions extends Model
{
    use SoftDeletes;


    protected $fillable =[
        'pr_no',
        'sister_company_id',
        'supplier_id',
        'title', 
        'description', 
        'requested_by_user_id',
        'status',  
        'total_amount',

    ];


    public function sisterCompany()
    {
        return $this->belongsTo(SisterCompany::class, 'sister_company_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    
    public function statusAproval()
    {
        return $this->belongsTo(StatusApproval::class, 'status', 'id');
    }



    

    
    
    
    

}
