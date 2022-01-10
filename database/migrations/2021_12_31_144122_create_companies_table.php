<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
            $table->string('legal_name', 100);
            $table->string('street_name', 100);
            $table->integer('house_number');
            $table->string('house_number_extra', 5)->nullable();
            $table->string('postal_code', 10);
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('country', 100);
            $table->string('telephone', 20)->nullable();
            $table->string('primary_website', 100);
            $table->string('primary_email', 100);
            $table->string('primary_invoice_email', 100);
            $table->text('optional_invoice_emails')->nullable();
            $table->tinyInteger('active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
