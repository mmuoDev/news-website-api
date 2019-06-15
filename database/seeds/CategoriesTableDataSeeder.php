<?php

use Illuminate\Database\Seeder;

class CategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['politics', 'entertainment', 'sports', 'business'];
        foreach ($categories as $category){
            \App\Category::create([
                'name' => $category
            ]);
        }
    }
}
