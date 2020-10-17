<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class CustomerController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) {

        //$query = Customer::query();
        //$query->with('description');
        //if($request->has('district_id')) $query->whereHas('districts', function($q)use($request){ $q->where('id',$request->get('district_id')); });
		//return ResourcesCustomer::collection(
        //    $query->paginate()
		//);
        return Customer::latest()->paginate(25);
	}

    /**
     * Store a newly created Customer in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(Customer::$validationRules);
        $new_customer = Customer::create($request->all());
        return response()->json($new_customer);
    }

    /**
     * Display the specified customer from database
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    /**
     * Update the specified customer in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        //$customer_data = $request->validate(Customer::$validationRules);
        $customer->update($request->all());
        return response()->json($customer, 200);
    }

    /**
     * Remove the specified customer from database.
     *
     * @param  \App\Customer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::destroy($id);
        return response()->json(null, 204);
    }
}
