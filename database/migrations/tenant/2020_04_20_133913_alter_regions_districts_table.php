<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRegionsDistrictsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('districts', function(Blueprint $table) {
      $table->string('longitude', 100)->after('zip_code')->nullable();
      $table->string('latutude', 100)->after('zip_code')->nullable();
    });

    Schema::table('regions', function (Blueprint $table) {
      $table->string('zip_code', 30)->nullable()->comment('Pochta indeksi')->change();
    });
    Schema::table('districts', function (Blueprint $table) {
      $table->string('zip_code', 30)->nullable()->comment('Pochta indeksi')->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('districts', function(Blueprint $table) {
      $table->dropColumn('latutude');
      $table->dropColumn('longitude');
    });
  }

}
