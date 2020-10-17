<?php

use App\Models\Filter;
use App\Models\FilterDescription;
use App\Models\FilterGroup;
use App\Models\FilterGroupDescription;
use App\Models\Language;
use Illuminate\Database\Seeder;

class FilterGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<10; $i++) {
            $filterGroup = new FilterGroup(['sort_order'=>$i]);
            $filterGroup->save();
        }
    }
}
