<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
		'name', 'image', 'sort_order', 'status'
	];
}
