<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('colours', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('endings', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('options', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('parameters', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('colours', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('endings', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('options', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('parameters', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
