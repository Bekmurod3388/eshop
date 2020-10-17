<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Filter
 * @package App\Models
 * @author Bekmurod Khujamuratov
 */

/**
 * @property integer $id
 * @property integer $filter_group_id
 * @property integer $sort_order
 * @property FilterGroup $filterGroup
 * @property FilterDescription[] $filterDescriptions
 */
class Filter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'filters';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['filter_group_id', 'sort_order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filterGroup()
    {
        return $this->belongsTo('App\Models\FilterGroup');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filterDescriptions()
    {
        return $this->hasMany('App\Models\FilterDescription');
    }
}
