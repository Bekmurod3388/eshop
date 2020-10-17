<?php

use Illuminate\Database\Seeder;

class CatchOfDayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catches = [
          ["product_id"=>'1',"catch"=>30],
          ["product_id"=>'2',"catch"=>10],
          ["product_id"=>'3',"catch"=>20],
          ["product_id"=>'4',"catch"=>50],
        ];
        foreach ($catches as $catch){
            \App\Models\CatchOfDay::create($catch);
        }
    }
}
