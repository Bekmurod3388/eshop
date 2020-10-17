<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryDescription extends Model {

  protected $fillable = [
    'country_id', 'language_id', 'name'
  ];

  public function country() {
    return $this->belongsTo('App\Models\Country');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
