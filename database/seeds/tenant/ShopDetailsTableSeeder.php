<?php

use Illuminate\Database\Seeder;

class ShopDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $list = [

                        ['contact_person'=>'Daniela Gryczova',
                            'website'=>'www.kozimbek.eshops.uz',
                            'about_us'=>'bizning internet magazin',
                            'address'=>'Development 2, Levoca, 05401',
                            'email'=>'daniela.gryczova@gmail.com',
                            'phone_number'=>'+421949683604'
                            ],
                        ['contact_person'=>'Gabriela Pavelkova',
                            'website'=>'www.durdonashop.uz',
                            'about_us'=>'bizning internet magazin',
                            'address'=>'unknown',
                            'email'=>'pavelkova.g@seznam.cz',
                            'phone_number'=>'99'
                        ],
                        ['contact_person'=>'Iveta Skalicka Skalicka',
                        'website'=>'www.eshops.uz',
                        'about_us'=>'bizning internet magazin',
                        'address'=>'V Uvozu 1146, 1146,Zin,76302',
                        'email'=>'cabilkovai@seznam.cz',
                        'phone_number'=>'+420606220257'
                    ],



                ];
               foreach ($list as $item)
               {
                   \App\Models\ShopDetail::create($item);
               }
            }

}
