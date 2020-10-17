<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParameterGroupDescriptionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('parameter_group_descriptions', function(Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('parameter_group_id');
      $table->unsignedBigInteger('language_id');
      $table->string('name', 64);
      $table->timestamps();
      $table->unique(['parameter_group_id', 'language_id'], 'uk_parameter_group_descriptions_parameter_languages');
      $table->foreign('parameter_group_id', 'fk_parameter_group_descriptions_parameter_group_id')
            ->references('id')->on('parameter_groups')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
      $table->foreign('language_id', 'fk_parameter_group_descriptions_language_id')
            ->references('id')->on('languages')
            ->onUpdate('RESTRICT')->onDelete('RESTRICT');
      $table->rememberToken();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('parameter_group_descriptions', function(Blueprint $table) {
      $table->dropForeign('fk_parameter_group_descriptions_parameter_group_id');
      $table->dropForeign('fk_parameter_group_descriptions_language_id');
    });
    Schema::drop('parameter_group_descriptions');
  }

}
