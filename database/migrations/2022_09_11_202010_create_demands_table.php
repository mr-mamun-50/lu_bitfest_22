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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('stopage_id');
            $table->string('sat_arr_time')->nullable();
            $table->string('sat_dep_time')->nullable();
            $table->string('sun_arr_time')->nullable();
            $table->string('sun_dep_time')->nullable();
            $table->string('mon_arr_time')->nullable();
            $table->string('mon_dep_time')->nullable();
            $table->string('tue_arr_time')->nullable();
            $table->string('tue_dep_time')->nullable();
            $table->string('wed_arr_time')->nullable();
            $table->string('wed_dep_time')->nullable();
            $table->string('thu_arr_time')->nullable();
            $table->string('thu_dep_time')->nullable();
            $table->string('fri_arr_time')->nullable();
            $table->string('fri_dep_time')->nullable();
            $table->string('bus_category')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('stopage_id')->references('id')->on('stopages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
};
