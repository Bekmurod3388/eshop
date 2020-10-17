<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryTypeDescription extends Model {

    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'
    ];

  public function delivery() {
    return $this->belongsTo('App\Models\DeliveryType');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
