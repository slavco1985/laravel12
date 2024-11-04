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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 225)->nullable();
            $table->string('fav', 225)->nullable();
            $table->string('mobile_no_1', 15)->nullable();
            $table->string('mobile_no_2', 15)->nullable();
            $table->string('email_1', 215)->nullable();
            $table->string('email_2', 215)->nullable();
            $table->string('web', 115)->nullable();
            $table->text('address')->nullable();
            $table->string('title', 225)->nullable();
            $table->text('meta')->nullable();
            $table->text('description')->nullable();
            $table->string('fb', 225)->nullable();
            $table->string('tw', 225)->nullable();
            $table->string('li', 225)->nullable();
            $table->string('ins', 225)->nullable();
            $table->string('yt', 225)->nullable();
            $table->string('pin', 225)->nullable();
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
        Schema::dropIfExists('site_infos');
    }
};
