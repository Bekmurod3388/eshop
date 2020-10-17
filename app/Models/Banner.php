<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property boolean $visibility
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @author Bekmurod Khujamuratov
 */
class Banner extends Model
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
    protected $fillable = ['id','name', 'visibility', 'remember_token', 'created_at', 'updated_at'];

}
