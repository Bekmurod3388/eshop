<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $order_code
 * @property integer $customer_id
 * @property integer $product_id
 * @property integer $type_of_delivery_id
 * @property integer $status_id
 * @property int $amount
 * @property integer $payment_method_id
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class ShoppingCart extends Model
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
    protected $fillable = ['order_code', 'customer_id', 'product_id', 'type_of_delivery_id', 'status_id', 'amount', 'payment_method_id', 'remember_token', 'created_at', 'updated_at'];

}
