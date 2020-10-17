<?php

use App\Models\CompanyAd;
use Illuminate\Database\Seeder;

class CompanyAdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [


            [
                'about_company'=>'kozimbek.shop',
                'privacy_policy'=>'maxfiy',
                'offer'=>'Taklif: dukon ochish imkoniyati',
                'payment_and_delivery'=>'tulov qilish va junatish',
                'exchange_and_return'=>'almashtirish yoki qaytarish imkoniyati',
                'bonus_program'=>'bonuslar',
            ],
            [

                'about_company'=>'durdona.shop',
                'privacy_policy'=>'maxfiy_kalit',
                'offer'=>'Taklif: dukon ochish imkoniyati',
                'payment_and_delivery'=>'tulov qilish va junatish imkoniyatlari',
                'exchange_and_return'=>'almashtirish yoki qaytarish imkoniyatining mavjudligi',
                'bonus_program'=>'bonusli imkoniyatlar',
            ],
            [
                'about_company'=>'kozimbek.shop',
                'privacy_policy'=>'maxfiy_kalit ikkinchi',
                'offer'=>'Taklif: dukon ochish imkoniyatining mavjudligi quvonarli',
                'payment_and_delivery'=>'tulov qilish va junatish imkoniyatlarining mavjudligi',
                'exchange_and_return'=>'almashtirish yoki qaytarish imkoniyati',
                'bonus_program'=>'bonus',
            ],


        ];
        foreach ($list as $item)
        {


            CompanyAd::create($item);

        }



    }
}
