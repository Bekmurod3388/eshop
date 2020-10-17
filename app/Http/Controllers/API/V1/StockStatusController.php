<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\StockStatus;
use Illuminate\Http\Request;

/**
 * Class StockStatusController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class StockStatusController extends Controller
{
    /**
     * Display a listing of the stock statuses in the database
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stock_status = StockStatus::latest("id");
        if($request->name != null){
            $stock_status = $stock_status->where("name",$request->name);
        }
        $stock_status = $stock_status->paginate(25);
        return response()->json($stock_status);
    }

    /**
     * Store a newly created stock status record in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(StockStatus::$validationRules);
        $new_stock_status = StockStatus::create($request->all());
        return response()->json($new_stock_status);
    }

    /**
     * Display the specified stock status from the database.
     *
     * @param  \App\StockStatus  $stockStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StockStatus::findOrFail($id);
    }

    /**
     * Update the specified stock status in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockStatus  $stockStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock_status = StockStatus::findOrFail($id);
        $request->validate(StockStatus::$validationRules);
        $stock_status->update($request->all());
        return response()->json($stock_status, 200);
    }

    /**
     * Remove the specified stock status from database.
     *
     * @param  \App\StockStatus  $stockStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = StockStatus::destroy($id);
    }
}
