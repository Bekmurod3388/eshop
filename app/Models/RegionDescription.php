<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionDescription extends Model {

  protected $fillable = [
    'region_id', 'language_id', 'name'
  ];

  public function region() {
    return $this->belongsTo('App\Models\Region');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
