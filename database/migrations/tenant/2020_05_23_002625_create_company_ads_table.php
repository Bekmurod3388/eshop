<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_company');
            $table->string('privacy_policy');
            $table->string('offer');
            $table->string('payment_and_delivery');
            $table->string('exchange_and_return');
            $table->string('bonus_program');
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
        Schema::dropIfExists('company_ads');
    }
}
