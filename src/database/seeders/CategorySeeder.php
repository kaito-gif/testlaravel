<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => '家電', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '食品', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '衣類', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '書籍', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}