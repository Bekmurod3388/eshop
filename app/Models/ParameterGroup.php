<?php
namespace App\Models;

use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class ParameterGroup extends Model {

  use Paginatable;

  protected $fillable = [
    'sort_order', 'status'
  ];

  public function description() {
    return $this->hasOne(ParameterGroupDescription::class);
  }

  public function scopeSorted($query) {
    return $query->orderBy('sort_order');
  }

  public function scopeUnsorted($query) {
    return $query->orderBy('sort_order', 'desc');
  }

}
