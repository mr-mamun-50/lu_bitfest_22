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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('s_id')->nullable();
            $table->string('t_id')->nullable();
            $table->string('t_dept')->nullable();
            $table->string('t_designation')->nullable();
            $table->string('batch')->nullable();
            $table->string('section')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
