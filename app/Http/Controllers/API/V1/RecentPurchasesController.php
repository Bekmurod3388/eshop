<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class RecentPurchasesController extends Controller
{
    /**
     * Display a listing of the recent purchases in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) {
        $recent_purchase = Order::latest()->paginate(25);
        return $recent_purchase;
	}
}
