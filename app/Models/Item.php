<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=[
        'itemName',
        'uom',
        'description',
        'category_id'

    ];


    
    public function categoryItem()
    {
        return $this->belongsTo(CategoryItem::class, 'id', 'category_id');
    }


    

}
