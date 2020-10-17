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
class CompanyAd extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_ads';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id','about_company','privacy_policy','offer','payment_and_delivery','exchange_and_return','bonus_program','remember_token', 'created_at', 'updated_at'];

}
