<?php
namespace App\Models;

use App\Tenant\Models\Tenant;
use App\Tenant\Traits\ForSystem;
use App\Tenant\Traits\IsTenant;
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
 * Class Shop
 * @package App\Models
 *
 */
class Shop extends Model implements Tenant
{
    use IsTenant, ForSystem;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'uuid', 'contact_person', 'website', 'about_us',
        'address', 'email', 'phone_number', 'open_days', 'active_days', 'enabled',
        'auto_deletion', 'new_products', 'bestsellers', 'our_recommendations',
        'promotions', 'client_ad', 'eurosoft_ad', 'catch_of_day', 'price', 'state',
        'edited_by', 'android', 'ios', 'remember_token', 'created_at', 'updated_at'];

}
