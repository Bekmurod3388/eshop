<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterDescription extends Model {

  protected $fillable = [
    'parameter_id',
    'language_id',
    'name'
  ];

  public function parameter() {
    return $this->belongsTo('App\Models\Parameter');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
