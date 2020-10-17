<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_code');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('state');
            $table->string('status');
            $table->unsignedBigInteger('price');
            $table->string('edited_by');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
            $table->foreign('payment_id')
                ->references('id')
                ->on('payment_methods');
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
        Schema::dropIfExists('purchases');
    }
}
