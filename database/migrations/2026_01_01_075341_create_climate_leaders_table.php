<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('climate_leaders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();  
            $table->string('phone');
            $table->string('Country_of_Nationality');
            $table->string('Country_of_Residence'); 
            $table->string('organization');
            $table->text('bio');
            $table->string('linkedin_profile')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('climate_leaders');
    }
};