<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

/**
 * Class DistrictController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class DistrictController extends Controller
{
    /**
     * Display a listing of the districts in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        $districts = District::latest();
        if($request->zip_code != null){
            $districts = $districts->where("zip_code",$request->zip_code);
        }
        if($request->latutude != null){
            $districts = $districts->where("latutude",$request->latutude);
        }
        if($request->longitude != null){
            $districts = $districts->where("longitude",$request->longitude);
        }
        $districts = $districts->paginate(25);
        return response()->json($districts);
    }

    /**
     * Store a newly created district in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_district = District::create($request->all());
        return response()->json($new_district);
    }

    /**
     * Display the specified district from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $district = District::findOrFail($id);
        return response()->json($district);
    }

    /**
     * Update the specified district in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $district = District::findOrFail($id);
        $district->update($request->all());
        return response()->json($district);
    }

    /**
     * Remove the specified district from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $district = District::destroy($id);
        return response()->json("Successfully removed");
    }
}
