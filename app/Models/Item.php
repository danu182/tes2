<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=[
        'kodeItem',
        'nameItem',
        'categoryItem_id',
        'tipeItem_id',
        'uom_id',
        'barcode',
        'foto',
        'merek',
        'seri',
        'description',
    ];


    public function categoryItem()
    {
        return $this->belongsTo(CategoryItem::class, 'categoryItem_id', 'id');
    }

    public function tipeItem()
    {
        return $this->belongsTo(TipeItem::class, 'tipeItem_id', 'id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
    
}
