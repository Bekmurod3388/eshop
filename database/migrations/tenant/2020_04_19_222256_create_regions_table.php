<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('regions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('country_id');
      $table->foreign('country_id')
          ->references('id')
          ->on('countries');
      $table->string('zip_code', 30)->comment('Pochta indeksi');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('regions');
  }

}
