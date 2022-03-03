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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('insertion', 20)->nullable();
            $table->string('last_name', 100);
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->string('telephone', 20);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('last_password_renewal')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger("is_admin")->default(0);
            $table->tinyInteger("active")->default(0);
            $table->integer("picture_default_id")->default(0);
            $table->tinyInteger("show_in_planning_rows")->default(0);
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
