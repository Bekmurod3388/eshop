<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
                $list = [
                    ['username' => 'BAHODIR', 'first_name' => 'Bahodir',
                        'last_name' => 'Kodirov',
                        'phone'=> '998902546499',
                        'email' => 'bahodir-uzb2@list.ru',
                        'address' => 'Ташкент, Яшнабадский район,массив Ташсе..., Этаж 6, Подъезд 3, Квартира 56',
                        'district_id'=>1,
                        'birth_date' => '2020-05-21 00:00:00',
                        'gender' => 'Мужской',
                        'password'  => 'Bahodir123'],

                    ['username' => 'BAHODIRJON', 'first_name' => 'Bahodirjon',
                        'last_name' => 'Kodirjonov',
                        'phone'=> '998902545454',
                        'email' => 'bahodir-uzb2@mail.ru',
                        'address' => 'Ташкент, Яшнабадский район,массив Ташсе..., Этаж 6, Подъезд 3, Квартира 56',
                        'district_id'=>1,
                        'birth_date' => '2020-05-21 00:00:00',
                        'gender' => 'Мужской',
                        'password'  => 'Bahodirjon321'],

                    ['username' => 'KOMIL', 'first_name' => 'Komil',
                        'last_name' => 'Tursunov',
                        'phone'=> '998902549999',
                        'email' => 'komil@list.ru',
                        'address' => 'Ташкент, Яшнабадский район,массив Ташсе..., Этаж 6, Подъезд 3, Квартира 56',
                        'district_id'=>1,
                        'birth_date' => '2020-05-21 00:00:00',
                        'gender' => 'Мужской',
                        'password'  => 'Komil123'],


                ];
               foreach ($list as $item)
               {
                   \App\Models\Customer::create($item);
               }
            }

}
