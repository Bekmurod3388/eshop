<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterGroupDescription extends Model {

  protected $fillable = [
    'attribute_group_id',
    'language_id',
    'name'
  ];

  public function attributeGroup() {
    return $this->belongsTo('App\Models\AttributeGroup');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
