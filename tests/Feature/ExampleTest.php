<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testCreateProduct(){
        $product = [
            'image' => 'path_store',
            'model'=> 'test2234',
            'stock'=> 1,
            'stock_status_id' => 2,
            'manufacturer_id' => 28,
            'price' => 123.00,
            'weight' => 123.00,
            'length' => 12300.00,
            'width' => 1230.00,
            'height' => 3123.00,
            'minimum' => 1,
            'viewed' => 1,
            'sort_order' => 0,
            'status' => 1
        ];
        $this->json('POST', '/api/v1/products', $product)
            ->assertStatus(422);
    }

    public function testCreateStockStatus(){
        $stock_status = [
            'language_id' => 1,
            'name'=> 'test2234'
        ];
        $this->json('POST', '/api/v1/stock-statuses', $stock_status)
            ->assertStatus(422);
    }
}
