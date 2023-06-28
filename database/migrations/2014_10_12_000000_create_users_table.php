<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->string('gender');
            $table->integer('birth_year');
            $table->integer('birth_month');
            $table->integer('birth_day');
            $table->string('address');
            $table->string('avatar')->nullable();
            $table->string('status');
            $table->text('introduction')->nullable();
            $table->integer('scores');
            $table->integer('scored_count');
            $table->string('password');
            $table->softDeletes();
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
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Schema::dropIfExists('users');
    }
}


