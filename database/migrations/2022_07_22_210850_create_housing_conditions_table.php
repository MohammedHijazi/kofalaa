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
        Schema::create('housing_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->enum('housing_type',['own','rented','other'])->default('rented');
            $table->string('rent_amount')->nullable();
            $table->string('number_of_rooms')->nullable();
            $table->string('people_per_room')->nullable();
            $table->string('building_condition')->nullable();
            $table->string('building_type')->nullable();
            $table->string('building_space')->nullable();
            $table->string('furniture_condition')->nullable();
            $table->string('description')->nullable();
            $table->string('social_status')->nullable();
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
        Schema::dropIfExists('housing_conditions');
    }
};
