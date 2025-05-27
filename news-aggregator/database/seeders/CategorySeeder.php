<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Technology'],
            ['name' => 'Business'],
            ['name' => 'Health'],
            ['name' => 'Sports'],
            ['name' => 'Entertainment'],
            ['name' => 'Science'],
            ['name' => 'General']
        ]);
    }
}
