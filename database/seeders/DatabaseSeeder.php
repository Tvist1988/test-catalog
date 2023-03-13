<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory(10)->create();
         Category::factory(10)->has(Product::factory()->count(20))->create();
         Review::factory(30)->create(['user_id' => User::inRandomOrder()->first()->id, 'product_id' => Product::inRandomOrder()->first()->id]);

    }
}
