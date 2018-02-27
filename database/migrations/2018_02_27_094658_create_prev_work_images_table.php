<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrevWorkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prev_work_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->integer('user_id');
            $table->integer('service_id');
            $table->string('name');
            $table->string('description');
            $table->string('caption');
            $table->timestamps();
        });

        Schema::table('prev_work_images', function($table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')
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
        Schema::dropIfExists('prev_work_images');
    }
}
