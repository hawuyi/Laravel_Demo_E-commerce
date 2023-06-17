<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::upsert([
            ['id' => 12, 'title' => '固定資料', 'content' => '固定內容', 'price' => rand(0, 300), 'quantity' => 20],
            ['id' => 14, 'title' => '固定資料2', 'content' => '固定內容2', 'price' => rand(0, 300), 'quantity' => 20]
        ], ['id'], ['price', 'quantity']);
    }
}
