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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->enum('type',['mother','father'])->default('mother');
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->date('death_date')->nullable();
            $table->string('father_job_before_death')->nullable();
            $table->string('death_cause')->nullable();
            $table->string('death_place')->nullable();
            $table->string('details')->nullable();
            $table->string('mother_health_status')->nullable();
            $table->string('mother_job_details')->nullable();
            $table->string('mother_income_amount')->nullable();
            $table->enum('live_with_children',['yes','no'])->nullable();
            $table->string('social_status')->nullable();
            $table->string('governorate')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
            $table->enum('education_level',['ضعيف','متوسط','ممتاز'])->nullable();
            $table->string('skills')->nullable();
            $table->enum('health_status',['سليم','مريض','اعاقة'])->nullable();
            $table->string('sickness_type')->nullable();
            $table->string('disability_type')->nullable();
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
        Schema::dropIfExists('parents');
    }
};
