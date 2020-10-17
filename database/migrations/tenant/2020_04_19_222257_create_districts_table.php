<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('districts', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('region_id');
      $table->foreign('region_id')
          ->references('id')
          ->on('regions');
      $table->string('zip_code', 30);
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
    Schema::dropIfExists('districts');
  }

}
