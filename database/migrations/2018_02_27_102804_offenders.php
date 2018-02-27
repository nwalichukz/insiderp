<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Offenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->integer('user_id');
            $table->string('offense');
            $table->string('punishment');
            $table->string('period');
            $table->timestamps();
        });

        Schema::table('offenders', function($table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
