<?php
use App\Models\Country;
use App\Models\CountryDescription;
use App\Models\District;
use App\Models\DistrictDescription;
use App\Models\Region;
use App\Models\RegionDescription;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
      Schema::disableForeignKeyConstraints();
    $countryList = [
      ['alpha_2' => 'UZ', 'alpha_3' => 'UZB'],
      ['alpha_2' => 'KZ', 'alpha_3' => 'KAZ'],
      ['alpha_2' => 'KG', 'alpha_3' => 'KGZ'],
    ];
    $regionList = [
      ["country_id" => '1', "zip_code"=>1],
      ["country_id" => '1', "zip_code"=>2],
      ["country_id" => '1', "zip_code"=>3],
      ["country_id" => '1', "zip_code"=>4],
      ["country_id" => '1', "zip_code"=>5],
      ["country_id" => '1', "zip_code"=>6],
      ["country_id" => '1', "zip_code"=>7],
      ["country_id" => '1', "zip_code"=>8],
    ];
    $districtList = [
      ['region_id' => '4', 'latutude' => '40,799999999999997157829056959599256516', 'longitude' => '72,166666666666699825327668804675340652'],
      ['region_id' => '4', 'latutude' => '40,785555555555596640715521061792969704', 'longitude' => '72,350833333333298469369765371084213257'],
      ['region_id' => '4', 'latutude' => '40,633333333333297332501388154923915863', 'longitude' => '72,25'],
      ['region_id' => '4', 'latutude' => '40,866666666666702667498611845076084137', 'longitude' => '72'],
      ['region_id' => '4', 'latutude' => '40,666666666666699825327668804675340652', 'longitude' => '71,916666666666699825327668804675340652'],
      ['region_id' => '4', 'latutude' => '40,616666666666702667498611845076084137', 'longitude' => '72,466666666666696983156725764274597168'],
      ['region_id' => '4', 'latutude' => '40,75', 'longitude' => '72,666666666666699825327668804675340652'],
      ['region_id' => '4', 'latutude' => '40,916666666666699825327668804675340652', 'longitude' => '72,25'],
      ['region_id' => '4', 'latutude' => '40,75', 'longitude' => '72,833333333333300174672331195324659348'],
      ['region_id' => '4', 'latutude' => '40,5', 'longitude' => '72,316666666666705509669554885476827621'],
      ['region_id' => '4', 'latutude' => '40,93333333333330159575780271552503109', 'longitude' => '72,5'],
      ['region_id' => '4', 'latutude' => '40,77166666666669669893963146023452282', 'longitude' => '71,670555555555594651195860933512449265'],
    ];
    foreach ($countryList as $country) {
        \App\Models\Country::create($country);
    }
    foreach ($regionList as $region) {
        \App\Models\Region::create($region);
    }
    foreach ($districtList as $district) {
        \App\Models\District::create($district);
      }
  }
}
