<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('user1'),
            'phone' => '081234567890',
            'type' => 1
        ]);
        DB::table('users')->insert(
        [
            'name' => 'driver1',
            'email' => 'driver1@gmail.com',
            'password' => Hash::make('driver1'),
            'phone' => '081234567891',
            'type' => 2
        ]);
        DB::table('users')->insert(
        [
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1'),
            'phone' => '081234567892',
            'type' => 3
        ]);

        DB::table('golf_carts')->insert(
            [
                'name' => 'Burok',
                'max_seat' => 5
            ]
        );
        DB::table('golf_carts')->insert(
            [
                'name' => 'Golf Cart Siapa',
                'max_seat' => 4
            ]
        );

        DB::table('routes')->insert(
            [
                'name' => 'Halte Gerbang Depan',
                'order' => 1,
                'time_to_next_stop' => 5
            ]
        );
        DB::table('routes')->insert(
            [
                'name' => 'Halte FT',
                'order' => 2,
                'time_to_next_stop' => 10
            ]
        );
        DB::table('routes')->insert(
            [
                'name' => 'Halte FEB',
                'order' => 3,
                'time_to_next_stop' => 15
            ]
        );
        DB::table('routes')->insert(
            [
                'name' => 'Halte Gerbang Belakang',
                'order' => 4,
                'time_to_next_stop' => 5
            ]
        );
        DB::table('routes')->insert(
            [
                'name' => 'Halte FMIPA',
                'order' => 5,
                'time_to_next_stop' => 10
            ]
        );
    }
}
