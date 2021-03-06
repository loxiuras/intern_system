<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 10)->default('free');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->date('date')->nullable();
            $table->integer('minutes')->nullable()->default(0);
            $table->tinyInteger('is_special')->default(0);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('accepted_datetime')->nullable();
            $table->bigInteger('accepted_user_id')->unsigned()->nullable();
            $table->foreign('accepted_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
