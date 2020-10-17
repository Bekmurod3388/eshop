<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictDescription extends Model {

  protected $fillable = [
    'district_id', 'language_id', 'name'
  ];

  public function district() {
    return $this->belongsTo('App\Models\District');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
