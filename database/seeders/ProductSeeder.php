<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('products')->insert([
        'title' => 'Çay',
        'price' =>    15,
        'desc' => 'Çay iç',
        'category_id' => '1',
      ]);
      DB::table('products')->insert([
        'title' => 'Hamburger',
        'price' =>    150,
        'desc' => 'Hamb',
        'category_id' => '2',
      ]);
    }
}
