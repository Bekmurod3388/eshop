<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Attribute as ResourcesAttribute;
use App\Models\Attribute;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller {

  public function index() {
    //return ResourcesAttribute::collection(
    //  Attribute::with([
    //      'description',
    //    ])->sorted()->paginate()
    //);
      $parameter = Parameter::latest()->paginate(25);
      return $parameter;
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
     * Store a newly created product parameter in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(Parameter::$validationRules);
        $new_parameter = Parameter::create($request->all());
        return response()->json($new_parameter);
    }

    /**
     * Display the specified product parameter from database
     *
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Parameter::findOrFail($id);
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
        $parameter = Parameter::findOrFail($id);
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
        $parameter = Parameter::destroy($id);
        return response()->json(null, 204);
    }
}
