<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('age')->nullable();
            $table->integer('role')->default(1);
            $table->integer('baned')->default(0);
            $table->string('sex')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname', 30)->nullable();
            $table->string('second_name')->nullable();
            $table->string('email')->unique();
            $table->string('skype')->nullable();
            $table->string('password', 60);
            $table->string('country')->nullable();
            $table->string('city')->nullable();

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
}
