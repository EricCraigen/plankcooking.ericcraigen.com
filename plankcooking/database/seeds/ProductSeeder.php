<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Spice Rubs
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'Ancho Chili Rub',
            'description' => 'Just a little spice, the Ancho Chili Rub has a rich-smoky chili flavor, with a very mild heat. Use it on chicken, pork, salmon, prawns, and ribs. The smoked ancho chili adds a smoky richness to the blend while the chipotle chili adds just a little zip.',
            'price' => 6.00,
            'priceDescription' => 'NET WT. 3.65 oz\'s',
            'sortOrder' => 1,
            'active' => 1,
            'ounces' => 3.65,
            'imagePath' => '/img/AnchoChiliRub.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-ACR',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'Salmon Rub',
            'description' => 'Chef Howie’s Original Signature Salmon Rub works great with the cedar, alder or BBQ planks. Imparts a subtle aromatic flavor to rich salmon. Made from dried herbs, fresh ground spices, brown sugar, kosher salt, garlic and lemon. Also great for searing, grilling and baking.',
            'price' => 6.00,
            'priceDescription' => 'NET WT. 3.65 oz\'s',
            'sortOrder' => 2,
            'active' => 1,
            'ounces' => 3.65,
            'imagePath' => '/img/SalmonRub.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-SAMR',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'Porcini Mushroom Rub',
            'description' => 'Chef Howie’s Porcini Mushroom Rub adds a rich mushroom flavor with a subtle hint of herb. Great with poultry, fish, seafood, pork and beef. Made from imported Italian porcini mushrooms, herbs, kosher salt, spices, and a hint of lemon.',
            'price' => 12.50,
            'priceDescription' => 'NET WT. 2.0 oz\'s',
            'sortOrder' => 3,
            'active' => 1,
            'ounces' => 2.0,
            'imagePath' => '/img/MushroomSpice.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-PMR',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'BBQ Spice Rub',
            'description' => 'Although Chef Howie’s BBQ Spice Rub is an aromatic blend of unique spices, star anise, ginger, allspice and more. Originally created for his Baby Back Ribs, we’ve since discovered that it works great for chicken, pork chops, ribs and roasts as well. Made from a unique blend of aromatic spices, brown sugar, kosher salt, onion and garlic.',
            'price' => 6.00,
            'priceDescription' => 'NET WT. 3.65 oz\'s',
            'sortOrder' => 4,
            'active' => 1,
            'ounces' => 3.65,
            'imagePath' => '/img/BBQSpiceRub.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-BBQSR',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'SPORT Steak Seasoning Rub',
            'description' => 'The perfect seasoning for great steaks. A nice blend of dried herbs, onion, garlic, spices and kosher salt. Created by Chef Howie’s youngest son as a gift for his teachers, it was so loved that Chef Howie decided to use it at SPORT.',
            'price' => 5.00,
            'priceDescription' => 'NET WT. 3.0 oz\'s',
            'sortOrder' => 5,
            'active' => 1,
            'ounces' => 3.0,
            'imagePath' => '/img/SportSteakRub.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-SSR',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 1,
            'name' => 'Gift Pack for All Four Rubs',
            'description' => 'All four the 3 Chef’s in a Tub, Spice Rubs and Seasoning Blends. The Ancho Chili Rub, Salmon Rub, Mushroom Rub, and the BBQ Spice Rub.',
            'price' => 26.00,
            'sortOrder' => 6,
            'active' => 1,
            'ounces' => 14.0,
            'imagePath' => '/img/FourSpicesPack.png',
            'handlingCost' => 0.00,
            'taxExempt' => 1,
            'sku' => 'SR-GP',
        ]);
        $product->save();

        // Cookbooks
        $product = new \App\Product([
            'categoryId' => 2,
            'name' => 'Passion & Palate',
            'description' => 'Chef Howie’s New Cookbook Passion & Palate is a collection of stories and recipes from Chef John Howie. The chef/proprietor who brought you the Award winning restaurants, Seastar Restaurant & Raw Bar, John Howie Steak, SPORT Restaurant & Bar, Adriatic Grill, Italian Cuisine & Wine Bar, and the culinary website plankcooking.com, now shares his creative culinary exploits with you. Passion & Palate will excite the senses with over 240 recipes, and 88 full color pictures. The recipe range is very eclectic with everything from some of Chef Howie’s best plank cooking recipes, to amazing soups, salads, seafood, meats, pastas, poultry, ceviche’s, poke, and sushi. All recipes were tested by home cooks. So you can be assured that these recipes will work in your home kitchen. Passion & Palate is the culmination of Chef Howie’s dream to bring exciting cuisine to the homes of his restaurant guests and fan of good food everywhere.',
            'price' => 42.00,
            'sortOrder' => 1,
            'active' => 1,
            'ounces' => 25.7,
            'imagePath' => '/img/passion_palate_cover.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'CB-PP',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 2,
            'name' => 'The Cedar Plank Cookbook **Out of Stock**',
            'description' => 'Chef Howie’s original cookbook with fifteen recipes for the cedar plank. Including his signature salmon, crab stuffed mushrooms, halibut with lemon-chardonnay sauce, sage rubbed pork loin roast with cider glaze, Cornish game hens with apple-cranberry stuffing, and many more.',
            'price' => 6.50,
            'sortOrder' => 2,
            'active' => 1,
            'ounces' => 9.0,
            'imagePath' => '/img/CedarCookbook.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'CB-CC',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 2,
            'name' => 'The Plank Cookbook',
            'description' => 'This is Chef Howie’s second cookbook with fifteen new recipes for your cedar, alder and BBQ grilling planks. Although each of the recipes in this cookbook were designed to be used with specific planks, they are not exclusive to the planks they were created for and can be used with either the cedar, alder or BBQ grilling planks. Includes recipes for lemon-garlic prawns, hazelnut salmon, lamb chops pepperonata, pork tenderloin with mango salsa, caramelized onion halibut and plank roasted turkey breast with cranberry compote, just to name a few.',
            'price' => 6.50,
            'sortOrder' => 3,
            'active' => 1,
            'ounces' => 9.0,
            'imagePath' => '/img/PlankCookbook.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'CB-PC',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 2,
            'name' => 'Both Plank Cookbooks **Out of Stock**',
            'description' => 'Both of Chef Howie’s Plank Cookbooks, The Cedar Plank Cookbook and The Plankcooking Cookbook, are included with this purchase.',
            'price' => 12.00,
            'sortOrder' => 4,
            'active' => 1,
            'ounces' => 18.0,
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'CB-BCB',
        ]);
        $product->save();

        // Baking Planks
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Small Cedar Plank',
            'description' => 'The Small Cedar Plank is primarily used to prepare servings for one or two people (13"x9"x1.5").',
            'price' => 32.00,
            'sortOrder' => 1,
            'active' => 1,
            'ounces' => 25.0,
            'imagePath' => '/img/SmallCedarPlank.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-SCP',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Small Cedar Plank with both cookbooks **Out of Stock**',
            'price' => 43.00,
            'sortOrder' => 2,
            'active' => 1,
            'ounces' => 43.0,
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-SCPWCB',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Large Cedar Plank',
            'description' => 'The Large Cedar Plank is primarily used in cooking meals for two or more people (16"x9"x1.5").',
            'price' => 38.00,
            'sortOrder' => 3,
            'active' => 0,
            'ounces' => 30.0,
            'imagePath' => '/img/LargeCedarPlank.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-LCP',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Large Cedar Plank with both cookbooks **Out of Stock**',
            'price' => 48.00,
            'sortOrder' => 4,
            'active' => 0,
            'ounces' => 48.0,
            'imagePath' => null,
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-LCPWCB',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Alder Plank',
            'description' => 'The Alder Planks are milder than the cedar planks, and impart a subtle woodsy flavor and aroma to anything roasted on them. Our alder planks are made from clear kiln dried alder. They come in one size only 16"x7"x1.5".',
            'price' => 42.00,
            'sortOrder' => 5,
            'active' => 1,
            'ounces' => 25.0,
            'imagePath' => '/img/LargeAlderPlank.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-AP',
        ]);
        $product->save();
        $product = new \App\Product([
            'categoryId' => 3,
            'name' => 'Alder Plank with both cookbooks **Out of Stock**',
            'price' => 52.00,
            'sortOrder' => 6,
            'active' => 1,
            'ounces' => 43.0,
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BP-APWCB',
        ]);
        $product->save();

        // BBQ Planks
        $product = new \App\Product([
            'categoryId' => 4,
            'name' => 'Cedar Barbecue Grilling Planks',
            'description' => 'Made for use on your BBQ grill. Incredible smoky cedar flavors are infused into your foods. Convenient size, one size fits most BBQ grills. Use with gas or charcoal grills. Package includes 6 one-time use BBQ planks, and two recipes. Each plank can be used to cook for up to four eight-ounce portions. Make your summer barbeques unique and flavorful with the Cedar Barbeque Grilling Planks.',
            'price' => 15.00,
            'sortOrder' => 1,
            'active' => 1,
            'ounces' => 26.0,
            'imagePath' => '/img/BBQPlank.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'BQP-CBGP',
        ]);
        $product->save();

        // Nut Driver
        $product = new \App\Product([
            'categoryId' => 5,
            'name' => 'Nut Driver',
            'description' => 'The nut driver is used to tighten the metal bolts that run through the baking planks. The bolts are there to help keep the plank from splitting and warping. Used with baking planks only, no bolts on the BBQ planks.',
            'price' => 3.00,
            'sortOrder' => 1,
            'active' => 1,
            'ounces' => 2.0,
            'imagePath' => '/img/NutDriver.png',
            'handlingCost' => 0.00,
            'taxExempt' => 0,
            'sku' => 'ND-ND1',
        ]);
        $product->save();

    }
}
