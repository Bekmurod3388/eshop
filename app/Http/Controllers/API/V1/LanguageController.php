<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Language as ResourcesLanguage;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        return ResourcesLanguage::collection(Language::paginate());
    }
}
