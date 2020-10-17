<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ShopDetail;
use Illuminate\Http\Request;


/**
 * Class ShopDetailController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod  Khujamuratov
 */

class ShopDetailController extends Controller
{
    /**
     * Display a listing of the shop_details in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(ShopDetail::all());
    }

    /**
     * Store a newly created shop_details in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_shopdetail = ShopDetail::create($request->all());
        return response()->json($new_shopdetail);
    }

    /**
     * Display the specified shop_details from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $shopdetail = ShopDetail::findOrFail($id);
        return response()->json($shopdetail);
    }

    /**
     * Update the specified shop_details in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $shopdetail = ShopDetail::findOrFail($id);
        $shopdetail->update($request->all());
        return response()->json($shopdetail);
    }

    /**
     * Remove the specified shop_details from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $shopdetail = ShopDetail::destroy($id);
        return response()->json("Successfully removed");
    }
}
