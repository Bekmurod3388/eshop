<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Switch user to specific tenant.
     *
     * @param Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function switch(Shop $shop)
    {
        session()->put('tenant', $shop->uuid);
    }
}
