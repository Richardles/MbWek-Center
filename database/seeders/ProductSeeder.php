<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Low Grade Angora Goat',
            'description' => 'Low Grade. Originated in Central Anatolia Region. Rich in fiber.',
            'price' => 11000000,
            'stock' => 137,
            'image' => 'kambing-angora-low.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'High Grade Angora Goat',
            'description' => 'Low Grade. Originated in Central Anatolia Region.',
            'price' => 35000000,
            'stock' => 9,
            'image' => 'kambing-angora-high.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Boer Goat',
            'description' => 'Originated in South Africa. Rich in meat',
            'price' => 1200000,
            'stock' => 150,
            'image' => 'kambing-boer.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => 5,
            'title' => 'Viterna',
            'description' => 'High Quality Vitamin for 0 - 5 years old.',
            'price' => 45000,
            'stock' => 999,
            'image' => 'vitamin.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'title' => 'Gedebog Pisang',
            'description' => 'High Quality Fiber for animal fodder.',
            'price' => 10000,
            'stock' => 678,
            'image' => 'gedebog-pisang.jpg'
        ]);
        
        DB::table('products')->insert([
            'category_id' => 4,
            'title' => 'Mineral Fodder',
            'description' => 'High Quality fodder for animal.',
            'price' => 5000,
            'stock' => 330,
            'image' => 'mineral-kambing.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'title' => 'Indonesian \'rumput\'',
            'description' => 'Basic goat fodder.',
            'price' => 500,
            'stock' => 9999,
            'image' => 'rumput.jpg'
        ]);
    }
}
