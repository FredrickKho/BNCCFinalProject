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
            'product_id' => '001',
            'category' => 'Sayur-sayuran',
            'name' => 'Brokoli',
            'price' => 60000,
            'qty' => 10, 
            'picture' => 'No Picture', 
        ]);
        DB::table('products')->insert([
            'product_id' => '002',
            'category' => 'Buah-buahan',
            'name' => 'apple',
            'price' => 20000,
            'qty' => 16, 
            'picture' => 'No Picture',  
        ]);
        DB::table('products')->insert([
            'product_id' => '003',
            'category' => 'Garasi',
            'name' => 'gergaji',
            'price' => 120000,
            'qty' => 4,  
            'picture' => 'No Picture', 
        ]);
        DB::table('products')->insert([
            'product_id' => '004',
            'category' => 'Other',
            'name' => 'KBBI',
            'price' => 55000,
            'qty' => 7,  
            'picture' => 'No Picture', 
        ]);
    }
}
