<?php

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['name' => 'top 10 products',
                'visibility'=>'1'],

            ['name' => 'kak zakazat',
                'visibility'=>'0'],

            ['name' => 'New Products',
                'visibility'=>'1'],

            ['name' => 'Bestsellers',
                'visibility'=>'1'],

            ['name' => 'Our Recommendation',
                'visibility'=>'1'],

            ['name' => 'Promotion',
                'visibility'=>'0'],

            ['name' => 'Catch of the day',
                'visibility'=>'0'],

            ['name' => 'Bepul yetkazib berish',
                'visibility'=>'1'],

            ['name' => 'Biz qabul qilamiz',
                'visibility'=>'0'],

            ['name' => 'Ранее вы смотрели',
                'visibility'=>'1'],

            ['name' => 'Client ad',
                'visibility'=>'1'],



        ];
        foreach ($list as $item)
        {
            Banner::create($item);
        }

    }
}
