<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_days', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->nullable();
            $table->integer('minutes')->default(0);
            $table->tinyInteger('is_special');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('accepted_datetime')->nullable();
            $table->bigInteger('accepted_user_id')->unsigned()->nullable();
            $table->foreign('accepted_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('free_days');
    }
}
