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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->enum('type',['وصي','حاضن','ولي']);
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->string('relation');
            $table->string('mobile_number')->nullable();
            $table->date('guardiation_data')->nullable();
            $table->string('issue_place')->nullable();
            $table->string('governorate')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('guardians');
    }
};
