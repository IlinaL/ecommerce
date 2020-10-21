<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Dresses
        for($i=1; $i <=18; $i++){
            Product::create([
                'name'=> 'Dress' . $i,
                'slug'=> 'dress-' . $i,
                'price'=> rand(2499,8899),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(1);
        }
        // Shorts & Skirts
        for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Shorts & Skirts' . $i,
                'slug'=> 'shorts & skirts-' . $i,
                'price'=> rand(2499, 4499),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(2);
        }

    
        // Jeans
        for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Jeans' . $i,
                'slug'=> 'jeans-' . $i,
                'price'=> rand(4499,7799),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(3);
        }

         // Jackets & Coats
         for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Jackets & Coats' . $i,
                'slug'=> 'jackets & coats-' . $i,
                'price'=> rand(5599,9555),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(4);
        }


         // Sweaters & Sweatshirts
         for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Sweaters & Sweatshirts' . $i,
                'slug'=> 'sweaters & sweatshirts-' . $i,
                'price'=> rand(3599, 8899),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(5);
        }


         // Blazers & Waistcoats
         for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Blazers & Waistcoats' . $i,
                'slug'=> 'blazers & waistcoats-' . $i,
                'price'=> rand(4099,6044),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(6);
        }

        
         // Trousers
         for($i=1; $i <= 18; $i++){
            Product::create([
                'name'=> 'Trousers' . $i,
                'slug'=> 'trousers-' . $i,
                'price'=> rand(2099,6688),
                'description'=>'100% Original Product. Pay on delivery might be available. Easy 30 days returns and exchanges.',
            ])->categories()->attach(7);
        }
    }
}