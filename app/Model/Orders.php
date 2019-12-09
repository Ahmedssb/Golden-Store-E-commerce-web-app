<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'user_id',
        'user_email',
        'name',
        'address',
        'city',
        'state',
        'picode',
        'phone',
        'shiping_charges',
        'coupon_code',
        'coupon_amoutn',
        'order_Status',
        'payment_method',
        'grand_total',

    ];
}
