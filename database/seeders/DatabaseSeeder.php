<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmed@birba.om',
            'password' => Hash::make('scwbirba@1122$'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'sales',
            'email' => 'sales@birba.om',
            'password' => Hash::make('Sadmin@1122'),
            'role' => 'user',
        ]);
    }
}