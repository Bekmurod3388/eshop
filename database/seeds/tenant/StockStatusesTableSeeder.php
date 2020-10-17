<?php

use App\Models\StockStatus;
use Illuminate\Database\Seeder;

class StockStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [ 'name' => 'In Stock'],
            [ 'name' => 'Pre-Order'],
            [ 'name' => 'Out Of Stock'],
            [ 'name' => '2-3 Days']
        ];

        foreach ($list as $item) {
            $model = new StockStatus();
            $model->language_id = 3;
            $model->name = $item['name'];
            $model->save();
        }
    }
}
