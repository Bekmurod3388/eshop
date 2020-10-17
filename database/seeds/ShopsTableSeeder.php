<?php

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function run()
    {
                $list = [

                        ['name'=>'some shop name',
                            'uuid'=>'uuid123',
                            'contact_person'=>'Daniela Gryczova',
                            'website'=>'www.kozimbek.eshops.uz',
                            'about_us'=>'bizning internet magazin',
                            'address'=>'Development 2, Levoca, 05401',
                            'email'=>'daniela.gryczova@gmail.com',
                            'phone_number'=>'+421949683604'
                            ],
                        ['name'=>'second shop name',
                            'uuid'=>'uuid1234',
                            'contact_person'=>'Gabriela Pavelkova',
                            'website'=>'www.durdonashop.uz',
                            'about_us'=>'bizning internet magazin',
                            'address'=>'unknown',
                            'email'=>'pavelkova.g@seznam.cz',
                            'phone_number'=>'99'
                        ],
                        ['name'=>'third shop name',
                        'uuid'=>'uuid12345',
                        'contact_person'=>'Iveta Skalicka Skalicka',
                        'website'=>'www.eshops.uz',
                        'about_us'=>'bizning internet magazin',
                        'address'=>'V Uvozu 1146, 1146,Zin,76302',
                        'email'=>'cabilkovai@seznam.cz',
                        'phone_number'=>'+420606220257'
                    ],



                ];
               foreach ($list as $item)
               {
                   Shop::create($item);
               }
            }

}
