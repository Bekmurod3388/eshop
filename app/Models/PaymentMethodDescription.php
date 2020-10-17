<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodDescription extends Model {

    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'
    ];

  public function payment() {
    return $this->belongsTo('App\Models\PaymentMethod');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
