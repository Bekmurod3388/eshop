<?php
use App\Models\Parameter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ParametersTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $list = [['name' => 'width', 'value' => '23'],
            ['name' => 'height', 'value' => '33'],
            ['name' => 'weight', 'value' => '10'],
            ['name' => 'length', 'value' => '23'],
            ['name' => 'size', 'value' => 'XL'],
            ['name' => 'size', 'value' => 'XXL'],];

        foreach ($list as $item) {
            $model = new Parameter($item);
            $model->save();
            /**$desc = new ParameterDescription();
            $desc->category_id = $model->id;
            $desc->language_id = 3;
            $desc->name = $item['name'];
            $desc->description = '';
            $desc->save();*/
        }
    }
}
