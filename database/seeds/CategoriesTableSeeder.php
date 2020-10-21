<?php
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        
        Category::insert([
            ['name'=>'Dresses', 'slug'=>'dresses','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Shorts & Skirts', 'slug'=>'shorts & skirts','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Jeans', 'slug'=>'jeans','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Jackets & Coats', 'slug'=>'jackets & coats','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Sweaters & Sweatshirts', 'slug'=>'sweaters & sweatshirts','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Blazers & Waistcoats', 'slug'=>'blazers & waistcoats','created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'Trousers', 'slug'=>'trousers','created_at'=> $now, 'updated_at'=> $now],


        ]);
    }
}
