<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the Tenant's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(ManufacturersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(CatchOfDayTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(DeliveryTypesTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(LogosTableSeeder::class);
        $this->call(MyFavoritesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(StockStatusesTableSeeder::class);
        $this->call(FilterGroupsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SliderTableSeeder::class);
    }
}
