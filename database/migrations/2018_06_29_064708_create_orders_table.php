<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company_name')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_county');
            $table->string('shipping_address1');
            $table->string('shipping_address2')->nullable();
            $table->string('shipping_postcode');
            $table->string('shipping_phone');
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company_name')->nullable();
            $table->string('billing_city');
            $table->string('billing_county');
            $table->string('billing_address1');
            $table->string('billing_address2')->nullable();
            $table->string('billing_postcode');
            $table->string('billing_phone');

            $table->string('email');
            $table->text('additional_info')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
