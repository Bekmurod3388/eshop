<?php

use App\Models\Logo;
use Illuminate\Database\Seeder;

class LogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [


            ['path' => asset('../storage/app/public/logos')],



        ];
        foreach ($list as $item)
        {


            Logo::create($item);

        }



    }
}
