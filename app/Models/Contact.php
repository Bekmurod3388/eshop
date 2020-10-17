<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     /**
* The table associated with the model.
*
* @var string
*/
    protected $table = 'contacts';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id','phone','email','address','open_hours','latitude','longitude','name','email_client','web_site','message','remember_token', 'created_at', 'updated_at'];
}
