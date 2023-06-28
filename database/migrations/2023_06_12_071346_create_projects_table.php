<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('contents');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('genre');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('location')->nullable();
            $table->softDeletes();
            // $table->decimal('longitude', 10, 8);//緯度を格納するカラム
            // $table->decimal('latitude', 10, 8);//経度を格納するカラム
            $table->integer('max_number');
            $table->decimal('hot', 6, 3);
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
        Schema::dropIfExists('projects');
    }
}

