<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Bekmurod Khujamuratov
 * @property integer $id
 * @property integer $sort_order
 * @property FilterGroupDescription[] $filterGroupDescriptions
 * @property Filter[] $filters
 */
class FilterGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'filter_groups';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id','sort_order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filterGroupDescriptions()
    {
        return $this->hasMany('App\Models\FilterGroupDescription');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filters()
    {
        return $this->hasMany('App\Models\Filter');
    }
}
