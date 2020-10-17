<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EurosoftAdTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
    }
}
