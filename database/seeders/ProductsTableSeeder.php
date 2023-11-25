<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Product 1', 'quantity' => 10, 'price' => 19.99],
            ['name' => 'Product 2', 'quantity' => 26, 'price' => 30.00],
            ['name' => 'Product 3', 'quantity' => 50, 'price' => 100.45],
            ['name' => 'Product 4', 'quantity' => 45, 'price' => 40.00],
            ['name' => 'Product 5', 'quantity' => 44, 'price' => 50.00]
        ]);
    }
}
