<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ARRAY DI TEST PER CATEGORIE -> DA CANCELLARE
        $categoriesRestaurant = [
            'Americano',
            'Argentino',
            'Cinese',
            'Coreano',
            'Dolci',
            'Europeo',
            'Gelato',
            'Giapponese',
            'Hamburgher',
            'Healthy',
            'Italiano',
            'Kebab',
            'Panini',
            'Sushi',
            'Vegetariano',
            'Pizza'
        ];
        
       foreach ($categoriesRestaurant as $categoryRestaurant) {

            $category = new Category();
            $category->name = $categoryRestaurant;
            $category->slug = Str::slug($category->name);
            $category->save();

       }

    }
}
