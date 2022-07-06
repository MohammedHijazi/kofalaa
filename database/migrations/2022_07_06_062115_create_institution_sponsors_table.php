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
        Schema::create('institution_sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('contact_person');
            $table->string('primary_phone')->unique();
            $table->string('secondary_phone')->unique()->nullable();
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
        Schema::dropIfExists('institution_sponsors');
    }
};
