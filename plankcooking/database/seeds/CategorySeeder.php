<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'websiteId' => 1,
            'name' => 'Spice Rub',
            'sortOrder' => 1,
            'websitePath' => 'Shop/SpiceRubs',
            'description' => 'Chef Howie created 3 Chefs In A Tub spice rubs and seasoning blends to bring professional flavor to home cooking. Very easy to use. Just season cook and serve. Made with all natural ingredients, dried herbs and mushrooms, spices, lemon, garlic, onion, brown sugar and kosher salt, no MSG or other chemical additives.',
            'imagePath' => '/img/SpiceRubs_Header.png',
        ]);
        $category->save();
        $category = new \App\Category([
            'websiteId' => 1,
            'name' => 'Cookbooks',
            'sortOrder' => 2,
            'websitePath' => '/Cookbooks',
            'imagePath' => '/img/Cookbooks_Header.png',
        ]);
        $category->save();
        $category = new \App\Category([
            'websiteId' => 1,
            'name' => 'Baking Planks',
            'sortOrder' => 3,
            'websitePath' => '/BakingPlanks',
            'description' => 'Cedar and Alder planks impart a subtle yet full flavored aroma to anything roasted on them. Our planks are made from clear kiln dried Western Red Cedar and Alder. Cedar roasting planks come in two sizes. Alder planks are available in one size only.',
            'imagePath' => '/img/BakingPlanks_Header.png',
        ]);
        $category->save();
        $category = new \App\Category([
            'websiteId' => 1,
            'name' => 'BBQ Planks',
            'sortOrder' => 4,
            'websitePath' => '/BBQPlanks',
            'imagePath' => '/img/BBQPlanks_Header.png',
        ]);
        $category->save();
        $category = new \App\Category([
            'websiteId' => 1,
            'name' => 'Nut Driver',
            'sortOrder' => 5,
            'websitePath' => '/NutDriver',
            'imagePath' => '/img/Cookbooks_Header.png',
        ]);
        $category->save();
    }
}
