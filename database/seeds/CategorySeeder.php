<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Reviews', 'Live Events', 'Reportage', 'Interviews', 'Instruments', 'DAW', 'Other'];
        foreach($categories as $model){
            $category = new Category();
            $category->name = $model;
            $category->slug = Str::slug($category->name);
            $category->save();
        }
    }
}
