<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'
    ];
}
