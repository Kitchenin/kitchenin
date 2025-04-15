<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('colour_id')->unsigned()->nullable();
            $table->foreign('colour_id')->references('id')->on('colours');

            $table->integer('option_id')->unsigned()->nullable();
            $table->foreign('option_id')->references('id')->on('options');

            $table->integer('ending_id')->unsigned()->nullable();
            $table->foreign('ending_id')->references('id')->on('endings');

            $table->string('custom_size')->nullable();
            $table->string('hinge_side')->nullable();
            $table->string('hinge_top')->nullable();
            $table->string('hinge_center')->nullable();
            $table->string('hinge_bottom')->nullable();

            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
