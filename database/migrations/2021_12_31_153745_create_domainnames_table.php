<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_names', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("company_id")->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('domain_name');
            $table->bigInteger('parent_domain_id')->unsigned();
            $table->foreign('parent_domain_id')->references('id')->on('domain_names');
            $table->tinyInteger('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_names');
    }
}
