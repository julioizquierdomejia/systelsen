<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('code');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('m_brands');

            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('m_models');

            $table->string('power_number');
            $table->string('power_measurement');
            $table->string('volt');
            $table->string('speed');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropForeign('brand_id');
            $table->dropForeign('model_id');
        });
        Schema::dropIfExists('motors');
    }
}
