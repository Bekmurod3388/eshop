<?php
namespace App\Models;

use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model {

  use Paginatable;
  protected $fillable = [
    'name', 'value'
  ];

  public function description() {
    return $this->hasOne(ParameterDescription::class);
  }

}
