<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    // {
    //     DB::table('users')->insert([
    //         [
    //             'name' => 'safi ullah',
    //             'email' => 'safi@gmail.com',
    //             'password' => bcrypt('password'),
    //             'role' => ('admin'),
    //             'status' => ('active'),
    //             'phone' => ('344566898'),


    //         ],
    //         [
    //             'name' => 'agents',
    //             'email' => 'agents@gmail.com',
    //             'password' => bcrypt('password'),
    //             'role' => ('agent'),
    //             'phone' => ('344566898')
    //         ],
    //         [
    //             'name' => 'user',
    //             'email' => 'user@gmail.com',
    //             'password' => bcrypt('password'),
    //             'role' => ('user'),
    //             'phone' => ('344566898')
    //         ],
    //     ]);
    // }
    
    {
        DB::table('users')->insert([
        [
            'name' => 'safi ullah',
            'email' => 'safi@gmail.com',
            'password' => bcrypt('password'),
            'phone' => 344566898,
            'address' => null, // or provide a default value
            'role' => 'admin',
            'status' => 'active',
        ],
        [
            'name' => 'agents',
            'email' => 'agents@gmail.com',
            'password' => bcrypt('password'),
            'phone' => 344566898,
            'address' => null, // or provide a default value
            'role' => 'agent',
            'status' => 'active',
        ],
        [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'phone' => 344566898,
            'address' => null, // or provide a default value
            'role' => 'user',
            'status' => 'active',
        ],
    ]);
}

}