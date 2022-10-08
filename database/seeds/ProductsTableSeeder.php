<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 150; $i++) {
            // $product = new Product();
            // $product->name = 
            // $product->cover = 
            // $product->description = 
            // $product->ingredients = 
            // $product->cooking_time = 
            // $product->price = 
            // $product->visible = 
            // $product->user_id = 
        }
    }
}
