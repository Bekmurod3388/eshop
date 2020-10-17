<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

/**
 * Class OrderStatusController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */
class OrderStatusController extends Controller {

    /**
     * This function returns all order statuses in the database
     * @return mixed
     */
  public function index() {
      $status = OrderStatus::latest()->paginate(25);
      return $status;
  }

    /**
     * Store a newly created order status in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(OrderStatus::$validationRules);
        $d = OrderStatus::create($request->all());
        return response()->json($d);
    }

    /**
     * Display the specified order status from database
     *
     * @param  \App\DeliveryType  $d
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OrderStatus::findOrFail($id);
    }

    /**
     * Update the specified order status in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = OrderStatus::findOrFail($id);
        //$parameter_data = $request->validate(Paremeter::$validationRules);
        $status->update($request->all());
        return response()->json($status, 200);
    }

    /**
     * Remove the specified order status from database.
     *
     * @param  \App\OrderStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = OrderStatus::destroy($id);
        return response()->json(null, 204);
    }
}
