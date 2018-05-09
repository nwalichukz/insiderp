<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobImagePeviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::defaultStringLength(191);
        Schema::create('job_image_peviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_offer_detail_id')->unsigned();
            $table->string('name');
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
        Schema::dropIfExists('job_image_peviews');
    }
}
