<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockStatus extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'language_id',
        'name'
	];

    /**
     * @var string[]
     * This are validation rules for the stock statuses table
     */
    public static $validationRules = [
        'name' => 'required|string|max:191',
    ];
}
