<?php

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PaymentMethodsTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $list = [['name' => 'Click'],
            ['name' => 'Card'],
            ['name' => 'Transfer'],
            ['name' => 'Cash']];

        foreach ($list as $item) {
            $model = new PaymentMethod($item);
            $model->save();
            /**$desc = new PaymentMethodDescription();
            $desc->category_id = $model->id;
            $desc->language_id = 3;
            $desc->name = $item['name'];
            $desc->description = '';
            $desc->save();*/
        }
    }
}
