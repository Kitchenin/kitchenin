<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEndingsGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ending_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('endings', function(Blueprint $table) {
            $table->dropForeign('endings_product_id_foreign');
        });

        Schema::table('endings', function(Blueprint $table) {
            $table->dropColumn('product_id');
            $table->unsignedInteger('ending_group_id')->nullable();
            $table->foreign('ending_group_id')->references('id')->on('ending_groups')->onDelete('cascade');
        });

        Schema::create('ending_product', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ending_id');
            $table->foreign('ending_id')->references('id')->on('endings')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('ending_product');

        Schema::table('endings', function(Blueprint $table) {
            $table->dropForeign('endings_ending_group_id_foreign');
        });

        Schema::table('endings', function(Blueprint $table) {
            $table->dropColumn('ending_group_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::dropIfExists('ending_groups');
    }
}
