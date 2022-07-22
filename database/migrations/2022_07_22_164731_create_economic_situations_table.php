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
        Schema::create('economic_situations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->string('average_income');
            $table->string('source_of_income');
            $table->enum('receive_help', ['yes', 'no'])->default('no');
            $table->string('help_amount')->nullable();
            $table->string('help_source')->nullable();
            $table->string('assets')->nullable();
            $table->string('assets_profits')->nullable();
            $table->string('total_income')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('economic_situations');
    }
};
