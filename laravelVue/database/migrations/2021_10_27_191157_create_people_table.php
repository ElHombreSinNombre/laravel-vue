<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name', 50)->nullable();
            $table->text('lastname', 12)->nullable();
            $table->integer('age')->nullable();
            $table->string('dni')->idNumber()->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_car');
            $table->foreign('id_car')->references('id')->on('cars')->unique()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
