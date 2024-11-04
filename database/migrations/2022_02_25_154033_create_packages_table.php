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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 225);
            $table->text('desic');
            $table->float('price');
            $table->integer('listing');
            $table->enum('verification', ['Yes', 'No']);
            $table->enum('message', ['Allowed', 'Not Allowed']);
            $table->enum('review', ['Yes', 'No']);
            $table->integer('services');
            $table->integer('products');
            $table->integer('images');
            $table->integer('validity');
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
        Schema::dropIfExists('packages');
    }
};
