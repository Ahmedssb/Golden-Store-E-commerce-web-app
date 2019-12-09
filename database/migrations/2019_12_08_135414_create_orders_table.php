<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()	;
            $table->string('user_email');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('picode');
            $table->string('phone');
            $table->string('shiping_charges');
            $table->string('coupon_code');
            $table->float('coupon_amoutn');
            $table->string('order_Status');
            $table->string('payment_method');
            $table->float('grand_total');
            $table->timestamps();


 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
