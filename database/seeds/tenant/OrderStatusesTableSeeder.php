<?php
use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $statuses = [['status' => 'In Cart'],
            ['status' => 'Pending'],
            ['status' => 'Delivered'],
            ['status' => 'Error'],
            ['status' => 'Done']];
        foreach ($statuses as $status) {
            $model = new OrderStatus($status);
            $model->save();
        }
    }
}
