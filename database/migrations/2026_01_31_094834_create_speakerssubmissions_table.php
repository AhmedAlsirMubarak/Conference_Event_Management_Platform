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
        Schema::create('speakers_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('contact_person');
            $table->string('job_title');
            $table->string('organization_name');
            $table->string('email_address');
            $table->string('phone_number');
            $table->string('country');
            $table->text('speaker_biography');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers_submissions');
    }
};