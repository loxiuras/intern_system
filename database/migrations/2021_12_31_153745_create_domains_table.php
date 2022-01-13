<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("company_id")->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('name');
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('domains');
            $table->bigInteger("host_id")->unsigned()->nullable();
            $table->foreign('host_id')->references('id')->on('hosts');
            $table->tinyInteger('is_production')->default(1);
            $table->tinyInteger('active');
            $table->integer('sequence')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
