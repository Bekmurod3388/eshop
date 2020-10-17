<?php

namespace App\Models;

use App\Models\Traits\Locale;
use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Paginatable, Locale;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

	protected $fillable = [
        'code', 'model', 'name', 'stock', 'stock_status_id', 'image', 'manufacturer_id', 'category_id', 'price',
        'standard_price', 'special_price', 'discount_price', 'actions', 'status', 'not_exist', 'promotion', 'new', 'free_delivery',
        'sale', 'visibility', 'luxury', 'action', 'novelty', 'tip', 'top', 'our_recommendation', 'age', 'minimum',
        'sort_order', 'short_description', 'viewed', 'created_at', 'updated_at'
	];


    /**
     * @var array
     */
    public static $validationRules = [
        'code' => 'required|integer|max:999999',
        'model' => 'required|string|max:191',
        'name' => 'string|max:191',
        'stock' => 'required|integer|min:0',
        'stock_status_id' => 'required|exists:stock_statuses,id|numeric',
        'image' => 'nullable|string',
        'manufacturer_id' => 'required|exists:manufacturers,id|numeric',
        'category_id' => 'required|exists:categories,id|numeric',
        'price' => 'required|numeric',
        'standard_price' => 'nullable|numeric',
        'special_price' => 'nullable|numeric',
        'discount_price' => 'nullable|numeric',
        'actions'=>'nullable|numeric',
        'minimum' => 'required|min:0',
        'sort_order' => 'required|integer|max:999999',
        'short_description' => 'string|nullable',
        'status' => 'required|integer|min:0|max:1',
        'viewed' => 'required|integer|min:0',
        'not_exist' => 'required|integer|min:0|max:1',
        'promotion' => 'required|integer|min:0|max:1',
        'new' => 'required|integer|min:0|max:1',
        'free_delivery' => 'required|integer|min:0|max:1',
        'sale' => 'required|integer|min:0|max:1',
        'visibility' => 'required|integer|min:0|max:1',
        'luxury' => 'required|integer|min:0|max:1',
        'action' => 'required|integer|min:0|max:1',
        'novelty' => 'required|integer|min:0|max:1',
        'tip' => 'required|integer|min:0|max:1',
        'top' => 'required|integer|min:0|max:1',
        'our_recommendation' => 'required|integer|min:0|max:1',
        'age' => 'required|integer|min:0|max:99999999',
    ];


    public function description() {
        $language_id = $this->getLanguageId();
		return $this->hasOne(ProductDescription::class)->where('language_id', $language_id);
    }

    public function descriptions() {
		return $this->hasMany(ProductDescription::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

	public function scopeSorted($query) {
        return $query->orderBy('sort_order');
    }

    public function scopeUnsorted($query) {
        return $query->orderBy('sort_order','desc');
    }

    public function scopeActive($query) {
        return $query->orderBy('active',self::STATUS_ACTIVE);
    }

    public function scopeInActive($query) {
        return $query->orderBy('active',self::STATUS_INACTIVE);
    }
}
