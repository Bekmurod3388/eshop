<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;


/**
 * Class RegionController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class PurchaseController extends Controller
{
    /**
     * Display a listing of the purchases in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        return response()->json(Purchase::all());
    }

    /**
     * Store a newly created Purchase in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $purchase = Purchase::create($request->all());
        return response()->json($purchase);
    }

    /**
     * Display the specified Purchase from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $purchase = Purchase::findOrFail($id);
        return response()->json($purchase);
    }

    /**
     * Update the specified Purchase in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());
        return response()->json($purchase);
    }

    /**
     * Remove the specified Purchase from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $purchase = Purchase::destroy($id);
        return response()->json("Successfully removed");
    }
}
