<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_degree');
            $table->string('specialty');
            $table->string('subspecialty');
            $table->string('national_id');
            $table->string('phone');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('clinic_address');
            $table->string('clinic_phone_number');
            $table->string('assistant_name');
            $table->string('assistant_phone_number');
            $table->integer('clinical_fees');
            $table->integer('segment_served')->default(1); //1=>A / 2=>B / 3=>C
            $table->string('upload_id')->nullable();
            $table->string('upload_license')->nullable();
            $table->string('upload_syndicate_id')->nullable();
            $table->string('upload_commercial_register')->nullable();
            $table->string('upload_tax_id')->nullable();
            $table->integer('sap_id')->nullable();
            $table->integer('city_clinic_id')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};