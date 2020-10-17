<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEurosoftAdsTable extends Migration
{
    /**
     * Run the migrations.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function up()
    {
        Schema::create('eurosoftad', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('path');
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
        Schema::dropIfExists('eurosoftad');
    }
}
