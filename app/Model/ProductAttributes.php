<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $table='producst_att';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'product_id',
        'sku',
        'size',
        'price',
        'stock',
    ];
}
