<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $contact_person
 * @property string $website
 * @property string $about_us
 * @property string $address
 * @property string $email
 * @property string $phone_number
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */


/**
 * Class ShopDetail
 * @package App\Models
 *
 */
class ShopDetail extends Model
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
    protected $fillable = ['contact_person', 'website', 'about_us', 'address', 'email', 'phone_number','latitude','longitude', 'remember_token', 'created_at', 'updated_at'];

}
