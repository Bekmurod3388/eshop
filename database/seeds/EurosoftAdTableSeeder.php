<?php

use App\Models\EurosoftAd;
use Illuminate\Database\Seeder;

class EurosoftAdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function run()
    {
        $list = [


            ['path' => asset('../storage/app/public/eurosoft_ads/left-banner.jpg')],



        ];
        foreach ($list as $item)
        {


            EurosoftAd::create($item);

        }



    }
}
