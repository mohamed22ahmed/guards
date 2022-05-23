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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('gender')->default(1); // 1 for male, 2 for female
            $table->date('birth_date');
            $table->string('phone');
            $table->string('national_id');
            $table->string('another_phone')->nullable();
            $table->string('occupation');
            $table->string('company_name');
            $table->boolean('is_insured')->default(false);
            $table->string('insurance_provider')->nullable();
            $table->integer('sap_id')->nullable();
            $table->string('city_clinic_id')->nullable();
            $table->string('account_status')->default(1); //(1 => Pending / 2 => Approved / 3 => Inactive)
            $table->unsignedBigInteger('relative_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};