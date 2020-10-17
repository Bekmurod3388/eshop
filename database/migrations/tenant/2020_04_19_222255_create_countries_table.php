<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('countries', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('alpha_2', 2);
      $table->string('alpha_3', 3)->nullable()->default(null);
      $table->timestamps();
      $table->rememberToken();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('countries');
  }

}
