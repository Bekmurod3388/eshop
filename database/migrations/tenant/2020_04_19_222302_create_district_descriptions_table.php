<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictDescriptionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('district_descriptions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('district_id');
      $table->foreign('district_id')
          ->references('id')
          ->on('districts');
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
    Schema::dropIfExists('district_descriptions');
  }

}
