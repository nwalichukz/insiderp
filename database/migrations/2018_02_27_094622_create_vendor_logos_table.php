<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_logos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
        Schema::table('vendor_logos', function($table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')
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
        Schema::dropIfExists('vendor_logos');
    }
}
