<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'category_id',
        'name',
        'code',
        'color',
        'description',
        'price',
        'image',
    ];

    public function attributes(){
        return $this->hasMany('App\Model\ProductAttributes','product_id');

    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');

    }
}
