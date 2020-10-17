<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $filters = [
            ["filter_group_id" => '1',"sort_order" => 1],
            ["filter_group_id" => '2',"sort_order" => 2],
            ["filter_group_id" => '3',"sort_order" => 3],
            ["filter_group_id" => '4',"sort_order" => 1],
            ["filter_group_id" => '5',"sort_order" => 1],
            ["filter_group_id" => '6',"sort_order" => 1],
            ["filter_group_id" => '7',"sort_order" => 1],
            ["filter_group_id" => '8',"sort_order" => 1],
            ["filter_group_id" => '9',"sort_order" => 1],
            ["filter_group_id" => '10',"sort_order" => 1],
            ["filter_group_id" => '11',"sort_order" => 1],
            ["filter_group_id" => '12',"sort_order" => 1],
            ["filter_group_id" => '13',"sort_order" => 1],
            ["filter_group_id" => '14',"sort_order" => 1],
        ];

        foreach ($filters as $filter){
            \App\Models\Filter::create($filter);
        }
    }
}
