<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('no_of_room')->nullable();
            $table->integer('cottage_id')->unsigned()->nullable();
            $table->foreign('cottage_id')->references('id')->on('cottages')->onDelete('cascade');
            $table->integer('no_of_cottage')->nullable();
            $table->date('checkin');
            $table->date('checkout')->nullable();
            $table->integer('pax')->default(0);
            $table->integer('price')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('pending')->nullable();
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
        Schema::dropIfExists('booking');
    }
}
