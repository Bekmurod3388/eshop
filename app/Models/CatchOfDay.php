<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property int $catch
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class CatchOfDay extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catch_of_day';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id','product_id', 'catch', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
