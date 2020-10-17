<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;


/**
 * Class RegionController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class RegionController extends Controller
{
    /**
     * Display a listing of the regions in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(Region::all());
    }

    /**
     * Store a newly created region in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_region = Region::create($request->all());
        return response()->json($new_region);
    }

    /**
     * Display the specified region from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $region = Region::findOrFail($id);
        return response()->json($region);
    }

    /**
     * Update the specified region in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $region = Region::findOrFail($id);
        $region->update($request->all());
        return response()->json($region);
    }

    /**
     * Remove the specified region from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $region = Region::destroy($id);
        return response()->json("Successfully removed");
    }
}
