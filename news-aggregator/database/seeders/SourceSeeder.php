<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     
    public function run(): void
    {
        // database/seeders/SourceSeeder.php
      

    DB::table('sources')->insert([
        ['name' => 'CNN'],
        ['name' => 'BBC News'],
        ['name' => 'TechCrunch'],
        ['name' => 'NDTV'],
    ]);
}

    }
