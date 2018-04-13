<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('job_offer_detail_id')->unsigned();
            $table->string('approval_status')->default('pending');
            $table->string('progress_status')->default('pending');
            $table->string('payment_status')->nullable();
            $table->string('commission');
            $table->timestamps();
            $table->foreign('job_offer_detail_id')->references('id')->on('job_offer_details')
                ->onUpdate('cascade');
             $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_offers');
    }
}
