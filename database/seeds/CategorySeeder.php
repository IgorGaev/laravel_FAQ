<?php

use Illuminate\Database\Seeder;
use Faq\Category;

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
        Category::create(['name'=>'Lorem']);
        Category::create(['name'=>'Ipsum']);
        Category::create(['name'=>'Bonorum']);
    }
}
