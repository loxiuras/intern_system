<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("company_id")->unsigned();
            $table->foreign("company_id")->references("id")->on("companies")->onUpdate("cascade")->onDelete("cascade");
            $table->bigInteger("created_user_id")->unsigned();
            $table->foreign("created_user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->bigInteger("updated_user_id")->unsigned();
            $table->foreign("updated_user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string("title", 255);
            $table->text("description")->nullable();
            $table->text("invoice_description")->nullable();
            $table->integer("invoice_price")->default( 0 );
            $table->integer("invoice_time")->default( 0 );
            $table->date("scheduled_date")->nullable();
            $table->tinyInteger("status")->default( 1 );
            $table->tinyInteger("invoice")->default( 0 );
            $table->dateTime("invoice_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
