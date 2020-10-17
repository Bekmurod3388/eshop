<?php

namespace App\Http\Controllers\API\V1;

use App\Events\Tenant\TenantWasCreated;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;


/**
 * Class RegionController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ShopController extends Controller
{
    /**
     * Display a listing of the Shops in database
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(){
        $shops = cache()->remember('shops', 10, function () {
            return Shop::get();
        });
        return response()->json($shops);
    }

    /**
     * Store a newly created shop in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request){
        $shop = Shop::create($request->all());
        cache()->forget('shops');
        event(new TenantWasCreated($shop));
        return response()->json($shop);
    }

    /**
     * Display the specified region from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $shop = Shop::findOrFail($id);
        return response()->json($shop);
    }

    /**
     * Update the specified shop in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $shop = Shop::findOrFail($id);
        $shop->update($request->all());
        return response()->json($shop);
    }

    /**
     * Remove the specified shop from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id){
        $shop = Shop::destroy($id);
        cache()->forget('shops');
        return response()->json("Successfully removed");
    }
}
