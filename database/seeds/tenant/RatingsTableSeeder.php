<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $ratings = [
            ["product_id"=>"1","customer_id"=>"1","rating"=>3],
            ["product_id"=>"2","customer_id"=>"2","rating"=>4],
            ["product_id"=>"3","customer_id"=>"3","rating"=>2],
            ["product_id"=>"4","customer_id"=>"1","rating"=>1],
            ["product_id"=>"5","customer_id"=>"1","rating"=>5],
        ];
        foreach ($ratings as $rating)
        {
            \App\Models\Rating::create($rating);
        }
    }
}
