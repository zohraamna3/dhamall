<?php
// database/seeders/CategoriesSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Earpods',
                'parent_category_id' => null,
            ],
            [
                'name' => 'Wireless Earpods',
                'parent_category_id' => 1, // Parent: Earpods
            ],
            [
                'name' => 'Wired Earpods',
                'parent_category_id' => 1, // Parent: Earpods
            ],
            [
                'name' => 'Accessories',
                'parent_category_id' => null, 
            ]
        ]);
    }
}
