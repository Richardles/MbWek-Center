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
            'title' => 'Ayam Kampung',
            'description' => 'Ayam kampung berkualitas yang dirawat dengan baik, siap potong.',
            'price' => 80000,
            'stock' => 1000,
            'image' => 'ayam-kampung.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Ayam Negeri',
            'description' => 'Ayam negeri berkualitas yang dirawat dengan baik, bisa dikembang biakan kembali.',
            'price' => 35000,
            'stock' => 5000,
            'image' => 'ayam-negeri.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Sapi Pedaging',
            'description' => 'Sapi berkualitas yang berumur 4 - 6 tahun.',
            'price' => 12000000,
            'stock' => 150,
            'image' => 'sapi.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Kambing',
            'description' => 'Kambing berkualitas yang berumur 2 - 3 tahun.',
            'price' => 3500000,
            'stock' => 500,
            'image' => 'kambing.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'title' => 'Susu Kambing',
            'description' => 'Susu kambing segar tanpa diolah dan alami.',
            'price' => 10000,
            'stock' => 6000,
            'image' => 'susu-kambing.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'title' => 'Telur Ayam Kampung',
            'description' => 'Telur ayam kampung berkualitas',
            'price' => 4000,
            'stock' => 10000,
            'image' => 'telur-ayam-kampung.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'title' => 'Telur Ayam Negeri',
            'description' => 'Telur ayam negeri berkualitas',
            'price' => 1750,
            'stock' => 50000,
            'image' => 'telur-ayam-negeri.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'title' => 'Makanan Kambing / Sapi',
            'description' => 'Diambil dari tanaman rumput gajah yang alami dan disukai para ternak. ( Dijual per kg )',
            'price' => 45000,
            'stock' => 3000,
            'image' => 'rumput-gajah.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'title' => 'Jagung Giling',
            'description' => 'Diambil dari jagung pilihan yang dibudidaya sendiri dan alami. Siap Pakai. ( Dijual per kg )',
            'price' => 8000,
            'stock' => 10000,
            'image' => 'jagung-giling.jpg'
        ]);
    }
}
