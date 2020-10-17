<?php
namespace App\Models;

use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
      protected $fillable = [
        'status'
      ];
    /**
     * @var string[]
     * This are validation rules for the order statuses table
     */
    public static $validationRules = [
        'status' => 'required|string|max:191',
    ];
}
