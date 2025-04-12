<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('Categories')->insert([
            ['CategoryName' => 'Earbuds', 'ParentCategoryId' => null],
            ['CategoryName' => 'Headphones', 'ParentCategoryId' => null],
            ['CategoryName' => 'Speakers', 'ParentCategoryId' => null],
        ]);
    }
}
