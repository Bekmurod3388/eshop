<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'name' => 'Uzbek',
                'code' => 'uz',
                'locale' => 'uz-Uz',
                'image' => 'uz.png',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Русский',
                'code' => 'ru',
                'locale' => 'rus-Rus',
                'image' => 'ru.png',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'name' => 'English',
                'code' => 'en',
                'locale' => 'en-En',
                'image' => 'en.png',
                'sort_order' => 3,
                'status' => 1,
            ],
        ]);
    }
}
