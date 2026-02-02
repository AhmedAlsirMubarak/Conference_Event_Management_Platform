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

        User::updateOrCreate(
            ['email' => 'ahmed@birba.om'],
            [
                'name' => 'Ahmed',
                'password' => Hash::make('scwbirba@1122$'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'sales@birba.om'],
            [
                'name' => 'sales',
                'password' => Hash::make('Sadmin@1122'),
                'role' => 'user',
            ]
        );
        
        User::updateOrCreate(
            ['email' => 'fatima@birba.om'],
            [
                'name' => 'fatima',
                'password' => Hash::make('fscw@1122'),
                'role' => 'user',
            ]
        );

    }
}