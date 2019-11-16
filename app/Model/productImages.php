<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class productImages extends Model
{
    //
    protected $table='product_images';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'product_id',
        'image',
       
    ];


    public function product(){
        return $this->belongsTo('App\Model\Product','product_id');

    }
}
