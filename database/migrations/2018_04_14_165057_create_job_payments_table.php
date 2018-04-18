<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_offer_detail_id')->unsigned();
            $table->string('payment_status')->nullable();
            $table->string('amount_paid');
            $table->string('amount_left');
            $table->timestamps();
            $table->foreign('job_offer_detail_id')->references('id')->on('job_offer_details')
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
        Schema::dropIfExists('job_payments');
    }
}
