<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('user_types')->insert(
            ['name' => 'user'],
        );
        DB::table('user_types')->insert(
            ['name' => 'driver'],
        );
        DB::table('user_types')->insert(
            ['name' => 'admin'],
        );

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'user1',
            'type' => 1
        ]);
        DB::table('users')->insert(
        [
            'name' => 'driver1',
            'email' => 'driver1@gmail.com',
            'password' => 'driver1',
            'type' => 2
        ]);
        DB::table('users')->insert(
        [
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => 'admin1',
            'type' => 3
        ]);
    }
}
