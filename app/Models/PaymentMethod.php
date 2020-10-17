<?php
namespace App\Models;

use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
      protected $fillable = [
        'name'
      ];
    /**
     * @var string[]
     * This are validation rules for the payment methods table
     */
    public static $validationRules = [
        'name' => 'required|string|max:191',
    ];
}
