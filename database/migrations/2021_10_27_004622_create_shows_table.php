<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();

            $table->foreignId('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreignId('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            // $table->string('movie_id');
            // $table->string('theater_id');
            $table->integer('schedule');
            $table->date('day');

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
        Schema::dropIfExists('shows');
    }
}
