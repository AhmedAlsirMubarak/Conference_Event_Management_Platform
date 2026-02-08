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
        Schema::create('sponsor_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('contact_person')->nullable();
            $table->string('job_title')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->text('additional_comments')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('language')->default('en');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsor_submissions');
    }
};
