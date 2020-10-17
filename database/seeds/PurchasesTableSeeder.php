<?php

use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
                $list = [
                        ['purchase_code'=>'123',
                            'shop_id'=>'1',
                            'payment_id'=>'1',
                            'state'=>'Pending',
                            'status'=>'Active',
                            'price'=>'654654',
                            'edited_by'=>'Bahodir'
                            ],
                    ['purchase_code'=>'1234',
                        'shop_id'=>'1',
                        'payment_id'=>'1',
                        'state'=>'Pending',
                        'status'=>'On Hold',
                        'price'=>'654654',
                        'edited_by'=>'Murodjon'
                    ],
                    ['purchase_code'=>'564',
                        'shop_id'=>'1',
                        'payment_id'=>'1',
                        'state'=>'Pending',
                        'status'=>'Active',
                        'price'=>'34563456',
                        'edited_by'=>'Dilshod'
                    ],
                    ['purchase_code'=>'4576',
                        'shop_id'=>'1',
                        'payment_id'=>'1',
                        'state'=>'Pending',
                        'status'=>'on hold',
                        'price'=>'345',
                        'edited_by'=>'Shahzod'
                    ],


                ];
               foreach ($list as $item)
               {
                   Purchase::create($item);
               }
            }

}
