<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDescriptionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('country_descriptions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('country_id');
      $table->foreign('country_id')
          ->references('id')
          ->on('countries');
      $table->unsignedBigInteger('language_id');
      $table->foreign('language_id')
          ->references('id')
          ->on('languages');
      $table->string('name')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('country_descriptions');
  }

}
