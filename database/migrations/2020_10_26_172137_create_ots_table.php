<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->date('date');
            $table->string('seller');

            $table->unsignedBigInteger('motor_id');
            $table->foreign('motor_id')->references('id')->on('motors');
            
            $table->boolean('status');

            $table->timestamps();
        });

        Schema::create('ots_status', function (Blueprint $table) {
            $table->unsignedBigInteger('ots_id');
            $table->foreign('ots_id')->references('id')->on('ots');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');

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
        Schema::table('ots', function (Blueprint $table) {
            $table->dropForeign('client_id');
            $table->dropForeign('motor_id');
        });

        Schema::table('ots_status', function (Blueprint $table) {
            $table->dropForeign('ots_id');
            $table->dropForeign('status_id');
        });

        Schema::dropIfExists('ots');
        Schema::dropIfExists('ots_status');
    }
}
