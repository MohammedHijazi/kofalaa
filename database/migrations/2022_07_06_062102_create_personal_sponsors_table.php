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
        Schema::create('personal_sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('governorate');
            $table->string('city');
            $table->string('street');
            $table->string('address');
            $table->string('nationality');
            $table->string('phone')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->string('id_number')->unique();
            $table->enum('id_type',['id','passport']);
            $table->foreignId('sponsor_id')->constrained('sponsors')->onDelete('cascade');
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
        Schema::dropIfExists('personal_sponsors');
    }
};
