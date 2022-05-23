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
        Schema::create('relatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('relationship'); //1-son, 2-daughter, 3-wife, 4-father, 5-mother
            $table->date('birth_date');
            $table->boolean('gender'); //1 => male, 2 => female
            $table->string('national_id');
            $table->integer('sap_id');
            $table->integer('city_clinic_id');
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
        Schema::dropIfExists('relatives');
    }
};