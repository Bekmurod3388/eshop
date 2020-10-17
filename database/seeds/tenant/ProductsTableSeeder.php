<?php

use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductDescription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $list = [['code' => 1234, 'model' => 'Samsung', 'name'=>'Phone', 'stock' => 1, 'image' => 'someUrl', 'stock_status_id' => 1, 'manufacturer_id' => 1,
            'category_id' => 1, 'price' => 123, 'standard_price' => 1234, 'special_price' => 123, 'actions' => 2.0,
            'minimum' => 2, 'viewed' => 4, 'sort_order' => 3, 'short_description' => 'Bu ajoyib produkt',
            'status' => 0, 'not_exist' => 0, 'promotion' => 0, 'new' => 0, 'free_delivery' => 0,
            'sale' => 0, 'visibility' => 0, 'luxury' => 0, 'action' => 0, 'novelty' => 0, 'tip' => 0,
            'top' => 0, 'our_recommendation' => 0, 'age' => 3],
            ['code' => 1234, 'model' => 'Samsung', 'name'=>'Phone', 'stock' => 1, 'image' => 'someUrl', 'stock_status_id' => 1, 'manufacturer_id' => 1,
                'category_id' => 1, 'price' => 123, 'standard_price' => 1234, 'special_price' => 123, 'actions' => 3.0,
                'minimum' => 2, 'viewed' => 4, 'sort_order' => 3, 'short_description' => 'Bu ajoyib produkt',
                'status' => 0, 'not_exist' => 0, 'promotion' => 0, 'new' => 0, 'free_delivery' => 0,
                'sale' => 0, 'visibility' => 0, 'luxury' => 0, 'action' => 0, 'novelty' => 0, 'tip' => 0,
                'top' => 0, 'our_recommendation' => 0, 'age' => 3],
            ['code' => 1234, 'model' => 'Samsung', 'name'=>'Phone', 'stock' => 1, 'image' => 'someUrl', 'stock_status_id' => 1, 'manufacturer_id' => 1,
                'category_id' => 1, 'price' => 123, 'standard_price' => 1234, 'special_price' => 123, 'actions' => 4.0,
                'minimum' => 2, 'viewed' => 4, 'sort_order' => 3, 'short_description' => 'Bu ajoyib produkt',
                'status' => 0, 'not_exist' => 0, 'promotion' => 0, 'new' => 0, 'free_delivery' => 0,
                'sale' => 0, 'visibility' => 0, 'luxury' => 0, 'action' => 0, 'novelty' => 0, 'tip' => 0,
                'top' => 0, 'our_recommendation' => 0, 'age' => 3]];

        foreach ($list as $item) {
            $model = new Product($item);
            $model->save();

            /**$desc = new CategoryDescription();
            $desc->category_id = $model->id;
            $desc->language_id = 3;
            $desc->name = $item['name'];
            $desc->description = '';
            $desc->save();*/
        }




        $languages = Language::all();
        $categories = Category::whereNotNull('parent_id')->get();
        factory(Product::class, 10)->create()->each(function ($product)use($languages, $categories) {
            foreach($languages as $lang){
                factory(ProductDescription::class,1)->create([
                    'product_id' => $product->id,
                    'language_id' => $lang->id
                ]);
            }
           // $product->categories()->attach($categories->random()->id);
        });
    }
}
