<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    protected $fillable = [
        'name', 'description', 'meta_title', 'meta_description', 'meta_keyword'
    ];
}
