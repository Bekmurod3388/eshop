<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->uuid('uuid');
            $table->string('contact_person');
            $table->string('website')->unique();
            $table->text('about_us')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->unsignedInteger('open_days')->nullable();
            $table->unsignedInteger('active_days')->nullable();
            $table->boolean('enabled')->default(false);
            $table->boolean('auto_deletion')->default(false);
            $table->boolean('new_products')->default(false);
            $table->boolean('bestsellers')->default(false);
            $table->boolean('our_recommendations')->default(false);
            $table->boolean('promotions')->default(false);
            $table->boolean('client_ad')->default(false);
            $table->boolean('eurosoft_ad')->default(false);
            $table->boolean('catch_of_day')->default(false);
            $table->boolean('price')->default(false);
            $table->boolean('state')->default(false);
            $table->boolean('edited_by')->default(false);
            $table->boolean('android')->default(false);
            $table->boolean('ios')->default(false);
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
        Schema::dropIfExists('shops');
    }
}
