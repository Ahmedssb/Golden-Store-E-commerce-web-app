<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    protected $table='orders_products';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'order_id',
        'user_id',
        'product_id',
        'product_code',
        'product_name',
        'product_size',
        'product_color',
        'price',
        'qty',
      
    ];


    public function order(){
        return $this->belongsTo('App\Model\Orders','order_id');

    }
}
