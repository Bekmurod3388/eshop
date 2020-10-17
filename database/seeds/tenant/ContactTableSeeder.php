<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
           ["phone"=>"+998(90)123-45-67",
               "email"=>"info@eshops.uz",
               "address"=>"Tashkent",
               "open_hours"=>"Понедельник – Суббота с 09:00 до 18:00",
               "latitude"=>"40.000",
               "longitude"=>"60.000",
               "name"=>"client",
               "email_client"=>"info@eshops.uz",
               "web_site"=>"kozimbek.eshops.uz",
               "message"=>"some words",

               ],

            ["phone"=>"+998(90)123-45-67",
                "email"=>"info@eshops1.uz",
                "address"=>"Tashkent",
                "open_hours"=>"Понедельник – Суббота с 08:00 до 17:00",
                "latitude"=>"50.000",
                "longitude"=>"70.000",
                "name"=>"client1",
                "email_client"=>"info1@eshops.uz",
                "web_site"=>"durdona.eshops.uz",
                "message"=>"some words1",

            ],
            ["phone"=>"+998(90)123-45-67",
                "email"=>"info2@eshops.uz",
                "address"=>"Tashkent",
                "open_hours"=>"Понедельник – Суббота с 09:00 до 18:00",
                "latitude"=>"40.000",
                "longitude"=>"60.000",
                "name"=>"client2",
                "email_client"=>"info2@eshops.uz",
                "web_site"=>"kozimbek.eshops.uz",
                "message"=>"some words2",

            ],
        ];

        foreach ($list as $item) {

            Contact::create($item);

        }

    }
}
