<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

/**
 * Class PaymentMethodController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */
class PaymentMethodController extends Controller {

    /**
     * This method returns all payment methods
     * @return mixed
     *
     */
  public function index() {
      $payment = PaymentMethod::latest()->paginate(25);
      return $payment;
  }

    /**
     * Store a newly created payment methods in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(PaymentMethod::$validationRules);
        $d = PaymentMethod::create($request->all());
        return response()->json($d);
    }

    /**
     * Display the specified payment methods from database
     *
     * @param  \App\PaymentMethod  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PaymentMethod::findOrFail($id);
    }

    /**
     * Update the specified payment methods in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentmethods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $method = PaymentMethod::findOrFail($id);
        //$method_data = $request->validate(PaymentMethod::$validationRules);
        $method->update($request->all());
        return response()->json($method, 200);
    }

    /**
     * Remove the specified payment methods from database.
     *
     * @param  \App\PaymentMethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = PaymentMethod::destroy($id);
        return response()->json(null, 204);
    }
}
