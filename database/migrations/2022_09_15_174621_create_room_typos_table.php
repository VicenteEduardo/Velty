<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTyposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_typos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_room');
            $table->foreign('fk_room')->references('id')->on('rooms')->onDelete('CASCADE')->onUpgrade('CASCADE');
           $table->string('name');
           $table->longText('descritpion');
            $table->softDeletes();
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
        Schema::dropIfExists('room_typos');
    }
}
