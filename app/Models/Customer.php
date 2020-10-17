<?php

namespace App\Models;

use App\Models\Traits\Locale;
use App\Models\Traits\Paginatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    use Paginatable, Locale;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

	protected $fillable = ['username', 'first_name', 'last_name', 'phone', 'email',
        'address', 'district_id', 'birth_date', 'gender', 'password'
    ];

    /**
     * @var array
     */
    public static $validationRules = [
        'username' => 'required|string|max:191',
        'first_name' => 'required|string|max:191',
        'last_name' => 'required|string|max:191',
        'phone' => 'required|string|max:191',
        'email' => 'string|max:191',
        'address' => 'required|string|max:191',
        'district_id' => 'required|exists:districts,id|numeric',
        'birth_date' => 'nullable',
        'gender'=> 'nullable|string',
        'password'=>'required|string|max:191'
    ];


    public function description() {
        $language_id = $this->getLanguageId();
		return $this->hasOne(CustomerDescription::class)->where('language_id', $language_id);
    }

    public function descriptions() {
		return $this->hasMany(CustomerDescription::class);
    }

    public function categories()
    {
        return $this->belongsToMany(District::class);
    }
}
