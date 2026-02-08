<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the unique index exists before dropping it
        $indexExists = DB::select(
            "SELECT COUNT(*) as count FROM information_schema.statistics 
             WHERE table_schema = DATABASE() 
             AND table_name = 'sponsor_submissions' 
             AND index_name = 'sponsor_submissions_email_address_unique'"
        );
        
        if ($indexExists && $indexExists[0]->count > 0) {
            Schema::table('sponsor_submissions', function (Blueprint $table) {
                $table->dropUnique('sponsor_submissions_email_address_unique');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsor_submissions', function (Blueprint $table) {
            $table->unique('email_address');
        });
    }
};
