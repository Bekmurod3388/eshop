<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderStatusDescription
 * @package App\Models
 * @author Bekmurod Khujamuratov
 */
class OrderStatusDescription extends Model {

    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'
    ];

  public function status() {
    return $this->belongsTo('App\Models\OrderStatus');
  }

  public function language() {
    return $this->belongsTo('App\Models\Language');
  }

}
