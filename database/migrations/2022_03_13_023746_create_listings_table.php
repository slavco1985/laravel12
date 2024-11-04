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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_name', 125);
            $table->string('url', 155);
            $table->string('image', 225)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->string('email', 155);
            $table->string('mobile', 25)->nullable();
            $table->string('website', 155)->nullable();
            $table->string('whatsapp', 25)->nullable();
            $table->text('address')->nullable();
            $table->float('rating', 5)->nullable();
            $table->boolean('featured')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('listings');
    }
};
