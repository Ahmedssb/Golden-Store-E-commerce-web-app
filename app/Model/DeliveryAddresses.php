<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddresses extends Model
{   
    protected $table='delivery_addresses';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'user_id',
        'user_email',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'phone',
    ];
    
}
