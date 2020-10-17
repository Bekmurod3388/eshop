<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $path
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @author Bekmurod Khujamuratov
 */
class Logo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logos';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['path'];

}
