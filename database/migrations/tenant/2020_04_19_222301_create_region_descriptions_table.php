<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionDescriptionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('region_descriptions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('region_id');
      $table->foreign('region_id')->references('id')->on('regions');
      $table->unsignedBigInteger('language_id');
      $table->foreign('language_id')
          ->references('id')
          ->on('languages');
      $table->string('name')->index();
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
    Schema::dropIfExists('region_descriptions');
  }

}
