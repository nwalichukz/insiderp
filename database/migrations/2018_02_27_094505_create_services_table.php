<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::defaultStringLength(191);
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('profession_title');
            $table->string('amount')->nullable();
            $table->string('skills')->nullable();
            $table->string('proficiency')->nullable();
            $table->string('status')->default('active');
            $table->string('location');
            $table->string('description')->nullable();
            $table->string('additional_service')->nullable();
            $table->string('service_category');

            $table->timestamps();
        });
          Schema::table('services', function($table) {
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
        Schema::dropIfExists('services');
    }
}
