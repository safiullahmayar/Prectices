<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'type_name' => 'property 1',
                'description' => 'description 1',
                'type_ican' => 'ican',

            ],
            [
                'type_name' => 'property 2',
                'description' => 'description 1',
                'type_ican' => 'ican',

            ],  [
                'type_name' => 'property 3',
                'description' => 'description 1',
                'type_ican' => 'ican',

            ],  [
                'type_name' => 'property 4',
                'description' => 'description 1',
                'type_ican' => 'ican',

            ],
        ]);
    }
}
