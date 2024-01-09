<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name'=> 'Uncategorizied',
        	'slug'=> 'uncategorizied',
        	'type'=> 0,
        	'user_id'=> 1,
        ]);
    }
}
