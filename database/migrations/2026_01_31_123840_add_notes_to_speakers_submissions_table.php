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
        if (!Schema::hasColumn('speakers_submissions', 'notes')) {
            Schema::table('speakers_submissions', function (Blueprint $table) {
                $table->text('notes')->nullable()->after('speaker_biography');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('speakers_submissions', function (Blueprint $table) {
            $table->dropColumn('notes');
        });
    }
};
