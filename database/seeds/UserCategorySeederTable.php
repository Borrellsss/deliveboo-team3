<?php

use Illuminate\Database\Seeder;
use App\Category;

class UserCategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Cinese',
            'Friggitoria',
            'Giapponese',
            'Hamburgheria',
            'Indiano',
            'Italiano',
            'Libanese',
            'Messicano',
            'Panineria',
            'Piadineria',
            'Pizzeria',
            'Steak House',
            'Vegano',
            'Vietnamita',
        ];

        foreach($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->save();
        }
    }
}
