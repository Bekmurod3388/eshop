<?php

use App\Models\ShopAd;
use Illuminate\Database\Seeder;

class ShopAdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [


            ['path' => asset('../storage/app/public/shop_ads/left-banner.jpg')],



        ];
        foreach ($list as $item)
        {


            ShopAd::create($item);

        }



    }
}
