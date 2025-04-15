<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colours', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });

        Schema::table('options', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });

        Schema::table('endings', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colours', function (Blueprint $table) {
            $table->dropColumn('index');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('index');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('index');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('index');
        });

        Schema::table('options', function (Blueprint $table) {
            $table->dropColumn('index');
        });

        Schema::table('endings', function (Blueprint $table) {
            $table->dropColumn('index');
        });
    }
}
