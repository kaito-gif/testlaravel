<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'new_name' => 'ノートPC',
                'description' => '高性能なノートパソコン',
                'price' => 120000,
                'stock' => 10,
                'is_published' => true,
                'category_id' => 1,  // 家電
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'new_name' => 'ワイヤレスマウス',
                'description' => '快適な操作感',
                'price' => 3000,
                'stock' => 50,
                'is_published' => true,
                'category_id' => 1,  // 家電
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'new_name' => 'オーガニックコーヒー',
                'description' => '香り高いコーヒー豆',
                'price' => 1500,
                'stock' => 30,
                'is_published' => true,
                'category_id' => 2,  // 食品
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'new_name' => 'Laravel入門書',
                'description' => '初心者向けの解説書',
                'price' => 2800,
                'stock' => 20,
                'is_published' => true,
                'category_id' => 4,  // 書籍
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}