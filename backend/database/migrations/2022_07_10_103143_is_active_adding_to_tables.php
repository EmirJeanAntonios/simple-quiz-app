<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IsActiveAddingToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->boolean("isActive")->default(true);
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->boolean("isActive")->default(true);
        });
        Schema::table('surveys', function (Blueprint $table) {
            $table->boolean("isActive")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
    }
}
