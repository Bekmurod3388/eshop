<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParameterDescriptionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('parameter_descriptions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('parameter_id');
      $table->unsignedBigInteger('language_id');
      $table->string('name', 64);
      $table->timestamps();
      $table->unique(['parameter_id', 'language_id'], 'uk_parameter_descriptions_parameters_languages');
      $table->foreign('parameter_id')
            ->references('id')->on('parameters')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
      $table->foreign('language_id')
            ->references('id')->on('languages')
            ->onUpdate('RESTRICT')->onDelete('RESTRICT');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('parameter_descriptions', function(Blueprint $table) {
      $table->dropForeign('fk_parameter_descriptions_parameter_id');
      $table->dropForeign('fk_parameter_descriptions_language_id');
    });
    Schema::drop('parameter_description');
  }

}
