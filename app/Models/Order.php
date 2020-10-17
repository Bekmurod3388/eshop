<?php

namespace App\Models;

use App\Models\Traits\Locale;
use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Paginatable, Locale;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

	protected $fillable = [
        'order_code', 'customer_id', 'product_id', 'type_of_delivery_id',
        'status_id', 'amount', 'payment_method_id'
	];

    /**
     * @var array
     */
    public static $validationRules = [
        'order_code' => 'required|integer',
        'amount' => 'integer'
    ];

    public function customer() {
        $customer_id = $this->getCustomerId();
        return $this->hasOne(Customer::class)->where('id', $customer_id);
    }
    public function product() {
        $product_id = $this->getProductId();
        return $this->hasOne(Product::class)->where('id', $product_id);
    }

    public function delivery() {
        $delivery_type_id = $this->getDeliveryTypeId();
        return $this->hasOne(DeliveryType::class)->where('id', $delivery_type_id);
    }
    public function status() {
        $status_id = $this->getStatusId();
        return $this->hasOne(OrderStatus::class)->where('id', $status_id);
    }

    public function payment() {
        $payment_method_id = $this->getPaymentMethodId();
        return $this->hasOne(PaymentMethod::class)->where('id', $payment_method_id);
    }

}
