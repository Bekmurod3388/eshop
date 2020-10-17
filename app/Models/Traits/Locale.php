<?php

namespace App\Models\Traits;

use App\Models\Language;
use Carbon\Carbon;

trait Locale {
	private $header = 'Accept-Language';

	public function getLanguageId() {
		$langCode = request()->hasHeader($this->header) ? request()->header($this->header) : 'uz';
    $cacheKey = 'lang_'.$langCode;
		$lang = cache()->remember($cacheKey, Carbon::now()->addDay(1), function () use ($langCode) {
			return Language::where('code',$langCode)->first();
		});
		return $lang ? $lang->id : 1;
	}
}
