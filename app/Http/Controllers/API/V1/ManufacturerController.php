<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Manufacturer as ResourcesManufacturer;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

/**
 * Class ManufacturerController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the manufacturers in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::latest('id');
        if($request->name != null){
            $manufacturers = $manufacturers->where("name",$request->name);
        }
        if($request->status != null){
            $manufacturers = $manufacturers->where("status",$request->status);
        }
        if($request->sort_order != null){
            $manufacturers = $manufacturers->where("sort_order",$request->sort_order);
        }
        $manufacturers = $manufacturers->paginate(25);

        return response()->json($manufacturers);
    }

    /**
     * Store a newly created manufacturer in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_manufacturer = Manufacturer::create($request->all());
        return response()->json($new_manufacturer);
    }

    /**
     * Display the specified manufacturer from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return response()->json($manufacturer);
    }

    /**
     * Update the specified manufacturer in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->all());
        return response()->json($manufacturer);
    }

    /**
     * Remove the specified manufacturer from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::destroy($id);
        return response()->json("Successfully removed");
    }
}
