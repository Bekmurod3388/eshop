<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [


            ['image_path' => asset('../storage/app/public/sliders/left-banner.jpg')],


        ];
        foreach ($list as $item)
        {


            Slider::create($item);

        }



    }
}
