<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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

            'name'=>'chairs',
            'sku'=> rand(1, 25), 
            'description'=>Str::random(10),
            'price'=>rand(11500, 25000),
            'active'=>rand(0, 1)

            
        ]);
    }
}
