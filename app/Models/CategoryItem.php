<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryItem extends Model
{
    use SoftDeletes;

    protected $fillable=[
            'nameCategory',
            'description',
        ];


    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
