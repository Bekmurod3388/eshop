<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('model');
            $table->string('name');
            $table->unsignedMediumInteger('stock')->default(0);
            $table->unsignedBigInteger('stock_status_id');
            $table->foreign('stock_status_id')
                ->references('id')
                ->on('stock_statuses');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('manufacturer_id');
            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->unsignedDecimal('price',20,2)->default(0);
            $table->unsignedDecimal('standard_price',20,2)->default(0);
            $table->unsignedDecimal('discount_price',20,2)->default(0);
            $table->unsignedDecimal('special_price',20,2)->default(0);
            $table->unsignedDecimal('actions',20,2)->default(0);
            $table->unsignedMediumInteger('minimum')->default(1);
            $table->smallInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->boolean('not_exist')->default(false);
            $table->boolean('promotion')->default(false);
            $table->boolean('new')->default(false);
            $table->boolean('free_delivery')->default(false);
            $table->boolean('sale')->default(false);
            $table->boolean('visibility')->default(false);
            $table->boolean('luxury')->default(false);
            $table->boolean('action')->default(false);
            $table->boolean('novelty')->default(false);
            $table->boolean('tip')->default(false);
            $table->boolean('top')->default(false);
            $table->boolean('our_recommendation')->default(false);
            $table->unsignedBigInteger('age');
            $table->unsignedMediumInteger('viewed')->default(0);
            $table->string('short_description');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
