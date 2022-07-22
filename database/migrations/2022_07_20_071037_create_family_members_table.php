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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->string('relation');
            $table->enum('gender',['male','female']);
            $table->string('social_status');
            $table->string('educational_qualification')->nullable();
            $table->string('grade')->nullable();
            $table->enum('education_level',['ضعيف','متوسط','ممتاز'])->nullable();
            $table->string('skills')->nullable();
            $table->string('job')->nullable();
            $table->enum('health_status',['سليم','مريض','اعاقة'])->default('سليم');
            $table->string('sickness_type')->nullable();
            $table->string('disability_type')->nullable();
            $table->enum('beneficiary_type',['غير مستفيد','مستفيد ايواء','مستفيد خدمات'])->default('غير مستفيد');
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
        Schema::dropIfExists('family_members');
    }
};
