<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\DeliveryType;
use Illuminate\Http\Request;

/**
 * Class DeliveryTypeController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */
class DeliveryTypeController extends Controller {

    /**
     * This method returns all delivery types
     * @return mixed
     *
     */
  public function index() {
    //return ResourcesAttribute::collection(
    //  Attribute::with([
    //      'description',
    //    ])->sorted()->paginate()
    //);
      $delivery = DeliveryType::latest()->paginate(25);
      return $delivery;
  }

//  public function index(Request $request) {
//    $query = Attribute::query();
//    $query->with('description');
//
//    $query->whereHas('description');
//
//    return ResourcesAttribute::collection($query->sorted()->paginate());
//  }


    /**
     * Store a newly created delivery type in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(DeliveryType::$validationRules);
        $d = DeliveryType::create($request->all());
        return response()->json($d);
    }

    /**
     * Display the specified delivery type from database
     *
     * @param  \App\DeliveryType  $d
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DeliveryType::findOrFail($id);
    }

    /**
     * Update the specified parameter in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parameter = DeliveryType::findOrFail($id);
        //$parameter_data = $request->validate(Paremeter::$validationRules);
        $parameter->update($request->all());
        return response()->json($parameter, 200);
    }

    /**
     * Remove the specified parameter from database.
     *
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parameter = DeliveryType::destroy($id);
        return response()->json(null, 204);
    }
}
