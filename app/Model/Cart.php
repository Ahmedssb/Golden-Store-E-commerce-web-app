<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='cart';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'product_id',
        'product_name',
        'product_code',
        'product_color',
        'size',
        'user_emaol',
        'session_id',
        'price',
        'quantity',
    ];
}
