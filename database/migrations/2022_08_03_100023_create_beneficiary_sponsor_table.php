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
        Schema::create('beneficiary_sponsor', function (Blueprint $table) {
            $table->foreignId('beneficiary_id')->constrained('family_members', 'id')->onDelete('cascade');
            $table->foreignId('sponsor_id')->constrained('sponsors', 'id')->onDelete('cascade');
            $table->primary(['beneficiary_id', 'sponsor_id']);
            $table->enum('sponsorship_type', ['monthly', 'yearly'])->default('monthly');
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
        Schema::dropIfExists('beneficiary_sponsor');
    }
};
