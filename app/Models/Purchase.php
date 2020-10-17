<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shop
 * @package App\Models
 * @author Bekmurod Khujamuratov
 */
class Purchase extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['purchase_code', 'shop_id', 'payment_id',
        'state', 'status', 'price', 'edited_by', 'remember_token', 'created_at', 'updated_at'];

}
