<?php

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few Manufacturers in our database:
        for ($i = 0; $i < 50; $i++) {
            Manufacturer::create([
                'name' => $faker->company,
                'image' => 'path/to/image',
                'sort_order' => 1,
                'status' => 1,
            ]);
        }
    }
}
