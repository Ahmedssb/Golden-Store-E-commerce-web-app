<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'username',
        'password',
        'status',
    ];
}
