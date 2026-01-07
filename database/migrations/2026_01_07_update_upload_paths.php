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
        // Update sponsor logos to include uploads/ prefix
        DB::table('sponsors')
            ->whereNotNull('logo')
            ->where('logo', 'not like', 'uploads/%')
            ->update([
                'logo' => DB::raw("CONCAT('uploads/', logo)")
            ]);

        // Update exhibitor logos to include uploads/ prefix
        DB::table('exhibitor')
            ->whereNotNull('logo')
            ->where('logo', 'not like', 'uploads/%')
            ->update([
                'logo' => DB::raw("CONCAT('uploads/', logo)")
            ]);

        // Update strategic speakers logos and photos
        DB::table('strategic_speakers')
            ->whereNotNull('logo')
            ->where('logo', 'not like', 'uploads/%')
            ->update([
                'logo' => DB::raw("CONCAT('uploads/', logo)")
            ]);

        DB::table('strategic_speakers')
            ->whereNotNull('photo')
            ->where('photo', 'not like', 'uploads/%')
            ->update([
                'photo' => DB::raw("CONCAT('uploads/', photo)")
            ]);

        // Update technical speakers logos and photos
        DB::table('technical_speakers')
            ->whereNotNull('logo')
            ->where('logo', 'not like', 'uploads/%')
            ->update([
                'logo' => DB::raw("CONCAT('uploads/', logo)")
            ]);

        DB::table('technical_speakers')
            ->whereNotNull('photo')
            ->where('photo', 'not like', 'uploads/%')
            ->update([
                'photo' => DB::raw("CONCAT('uploads/', photo)")
            ]);

        // Update strategic committees logos and photos (from Committe/ to uploads/committees/)
        DB::table('strategic_committees')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'Committe/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'Committe/', 'uploads/committees/')")
            ]);

        DB::table('strategic_committees')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'Committe/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'Committe/', 'uploads/committees/')")
            ]);

        // Update technical committees logos and photos (from Committe/ to uploads/committees/)
        DB::table('technical_committees')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'Committe/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'Committe/', 'uploads/committees/')")
            ]);

        DB::table('technical_committees')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'Committe/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'Committe/', 'uploads/committees/')")
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse the path updates
        DB::table('sponsors')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/sponsor_logos/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/', '')")
            ]);

        DB::table('exhibitor')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/exhibitor_logos/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/', '')")
            ]);

        DB::table('strategic_speakers')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/speakers/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/', '')")
            ]);

        DB::table('strategic_speakers')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'uploads/speakers/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'uploads/', '')")
            ]);

        DB::table('technical_speakers')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/speakers/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/', '')")
            ]);

        DB::table('technical_speakers')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'uploads/speakers/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'uploads/', '')")
            ]);

        DB::table('strategic_committees')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/committees/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/committees/', 'Committe/')")
            ]);

        DB::table('strategic_committees')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'uploads/committees/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'uploads/committees/', 'Committe/')")
            ]);

        DB::table('technical_committees')
            ->whereNotNull('logo')
            ->where('logo', 'like', 'uploads/committees/%')
            ->update([
                'logo' => DB::raw("REPLACE(logo, 'uploads/committees/', 'Committe/')")
            ]);

        DB::table('technical_committees')
            ->whereNotNull('photo')
            ->where('photo', 'like', 'uploads/committees/%')
            ->update([
                'photo' => DB::raw("REPLACE(photo, 'uploads/committees/', 'Committe/')")
            ]);
    }
};
