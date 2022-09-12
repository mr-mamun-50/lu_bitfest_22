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
        Schema::create('busses', function (Blueprint $table) {
            $table->id();
            $table->string('code_name');
            $table->string('capacity');
            $table->string('liscence_number');
            $table->string('bus_category')->nullable();
            $table->boolean('is_active');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('route_id')->nullable();
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('route_id')->references('id')->on('bus_routes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busses');
    }
};
