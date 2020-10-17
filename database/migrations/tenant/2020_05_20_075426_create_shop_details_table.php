<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact_person');
            $table->string('website')->unique();
            $table->text('about_us')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->decimal('latitude');
            $table->decimal('longitude');
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
        Schema::dropIfExists('shop_details');
    }
}
