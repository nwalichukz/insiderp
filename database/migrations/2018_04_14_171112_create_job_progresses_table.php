<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_offer_detail_id')->unsigned();
            $table->string('progress_status')->default('pending');
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
        Schema::dropIfExists('job_progresses');
    }
}
