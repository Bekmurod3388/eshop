<?php

use Illuminate\Database\Seeder;

class MyFavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $myFavorites = [
            ["product_id"=>"1","customer_id"=>"1"],
            ["product_id"=>"2","customer_id"=>"2"],
            ["product_id"=>"3","customer_id"=>"3"],
            ["product_id"=>"4","customer_id"=>"1"],
            ["product_id"=>"5","customer_id"=>"1"],
        ];
        foreach ($myFavorites as $myFavorite){
            \App\Models\MyFavorite::create($myFavorite);
        }
    }
}
