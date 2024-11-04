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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('email_activation')->default(0);
            $table->string('currency', 10)->default('USD/$');
            $table->string('currency_code', 10)->default('USD');
            $table->string('currency_symbol', 10)->default('$');
            $table->enum('currency_type', ['Symbol', 'Code'])->default('Symbol');
            $table->boolean('messsage_notification')->default(0);
            $table->boolean('review_notification')->default(0);
            $table->tinyInteger('list_view')->default(12);
            $table->tinyInteger('grid_view')->default(12);
            $table->tinyInteger('blog')->default(12);
            $table->tinyInteger('featured_list')->default(3);
            $table->tinyInteger('latest_list')->default(3);
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
        Schema::dropIfExists('app_settings');
    }
};
