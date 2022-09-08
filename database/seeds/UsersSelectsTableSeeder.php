<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class UsersSelectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Contorni',
            'Scelta dello Chef'
        ];

        // Per ogni elemento dell'array categories creiamo una nuova riga nel db
        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');
            $new_category->save();
        }
    }
}
