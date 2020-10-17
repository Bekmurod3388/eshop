<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use Illuminate\Http\Request;


/**
 * Class FilterController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class FilterController extends Controller
{
    /**
     * Display a listing of the filters in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(Filter::all());
    }

    /**
     * Store a newly created filter in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
//        $new_filter = Filter::create($request->all());
        return response()->json($request->all());
    }

    /**
     * Display the specified filter from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $filter = Filter::findOrFail($id);
        return response()->json($filter);
    }

    /**
     * Update the specified filter in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $filter = Filter::findOrFail($id);
        $filter->update($request->all());
        return response()->json($filter);
    }

    /**
     * Remove the specified filter from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $filter = Filter::destroy($id);
        return response()->json("Successfully removed");
    }
}
