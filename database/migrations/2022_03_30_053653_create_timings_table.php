<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained();

            $table->time('monday_from', $precision = 0)->nullable();
            $table->time('monday_to', $precision = 0)->nullable();
            $table->time('tuesday_from', $precision = 0)->nullable();
            $table->time('tuesday_to', $precision = 0)->nullable();
            $table->time('wednesday_from', $precision = 0)->nullable();
            $table->time('wednesday_to', $precision = 0)->nullable();
            $table->time('thursday_from', $precision = 0)->nullable();
            $table->time('thursday_to', $precision = 0)->nullable();
            $table->time('friday_from', $precision = 0)->nullable();
            $table->time('friday_to', $precision = 0)->nullable();
            $table->time('saturday_from', $precision = 0)->nullable();
            $table->time('saturday_to', $precision = 0)->nullable();
            $table->time('sunday_from', $precision = 0)->nullable();
            $table->time('sunday_to', $precision = 0)->nullable();

            $table->text('iframe')->nullable();

            $table->string('facebook', 155)->nullable();
            $table->string('twitter', 155)->nullable();
            $table->string('youtube', 155)->nullable();
            $table->string('pintrest', 155)->nullable();
            $table->string('instagram', 155)->nullable();
            $table->string('linkedin', 155)->nullable();
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
        Schema::dropIfExists('timings');
    }
};
