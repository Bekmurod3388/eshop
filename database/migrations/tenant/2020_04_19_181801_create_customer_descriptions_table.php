<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void

    public function up()
    {
        Schema::create('customer_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('meta_title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->rememberToken();
        });
    }
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_descriptions');
    }
}
