<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoursAsGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colour_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('colours', function(Blueprint $table) {
            $table->dropForeign('colours_product_id_foreign');
        });

        Schema::table('colours', function(Blueprint $table) {
            $table->dropColumn('product_id');
            $table->unsignedInteger('colour_group_id')->nullable();
            $table->foreign('colour_group_id')->references('id')->on('colour_groups')->onDelete('cascade');
        });

        Schema::create('colour_product', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('colour_id');
            $table->foreign('colour_id')->references('id')->on('colours')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('colour_product');

        Schema::table('colours', function(Blueprint $table) {
            $table->dropForeign('colours_colour_group_id_foreign');
        });

        Schema::table('colours', function(Blueprint $table) {
            $table->dropColumn('colour_group_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::dropIfExists('colour_groups');
    }
}
