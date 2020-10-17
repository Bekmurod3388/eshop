<?php
use App\Models\DeliveryType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DeliveryTypesTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $list = [['name' => 'Post'],
            ['name' => 'Delivery'],
            ['name' => 'Pick Up']];

        foreach ($list as $item) {
            $model = new DeliveryType($item);
            $model->save();
            /**$desc = new DeliveryTypeDescription();
            $desc->category_id = $model->id;
            $desc->language_id = 3;
            $desc->name = $item['name'];
            $desc->description = '';
            $desc->save();*/
        }
    }
}
