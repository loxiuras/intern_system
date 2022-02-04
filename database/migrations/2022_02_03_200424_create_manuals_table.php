<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reference');
            $table->string('title');
            $table->bigInteger("created_user_id")->unsigned();
            $table->foreign("created_user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->bigInteger("updated_user_id")->unsigned();
            $table->foreign("updated_user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manuals');
    }
}
