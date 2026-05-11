<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate([
            'name' => 'Chester',
            'email' => 'chester@gokw.ca',
            'password' => bcrypt(env('DEFAULT_USER_PASSWORD')),
        ]);
        
        User::updateOrCreate([
            'name' => 'Nicolas',
            'email' => 'nicolas@gokw.ca',
            'password' => bcrypt(env('DEFAULT_USER_PASSWORD')),
        ]);
    }
}
