<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create(['title' => '測試資料', 'content' => '測試內容', 'price' => rand(0, 300), 'quantity' => 20]);
        Product::create(['title' => '測試資料2', 'content' => '測試內容', 'price' => rand(0, 300), 'quantity' => 20]);
        Product::create(['title' => '測試資料3', 'content' => '測試內容', 'price' => rand(0, 300), 'quantity' => 20]);
        $this->call(ProductSeeder::class);
        $this->command->info('產生固定 product 資料');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
