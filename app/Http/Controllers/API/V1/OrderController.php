<?php

namespace App\Http\Controllers\API\V1;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class OrderController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class OrderController extends Controller
{
    /**
     * Display a listing of the orders in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) {
        $order = Order::latest()->paginate(25);
        return $order;
	}

    /**
     * Store a newly created order in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(Order::$validationRules);
        $order = Order::create($request->all());
        return response()->json($order);
    }

    /**
     * Display the specified order from database
     *
     * @param  \App\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::findOrFail($id);
    }

    /**
     * Update the specified order in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        //order_data = $request->validate(Order::$validationRules);
        $order->update($request->all());
        return response()->json($order, 200);
    }

    /**
     * Remove the specified order from database.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::destroy($id);
        return response()->json(null, 204);
    }

    /**
     * get all top products which are the most sold products
     */
    public function getTopProducts(Request $request) {
        $products = [];
        $top_products = DB::table('orders')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->select('product_id', DB::raw('sum(amount) as total'))
            ->groupBy('product_id')->orderByDesc('total')
            ->get();
        foreach ($top_products as $p){
            $pro = DB::table('products')
                ->where('id', '=', $p->product_id)
                ->first();
            if ($pro != null) {
                array_push($products, $pro);
            }
        }

        return response()->json($products);
    }

    /**
     * get all best sellers = the most expensive * quantity
     */
    public function getBestsellers() {
        $bestsellers = [];
        $top_products = DB::table('orders')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->select('product_id', DB::raw('sum(amount) as total'))
            ->groupBy('product_id')
            ->get();
        foreach ($top_products as $p){
            $pro = DB::table('products')
                ->where('id', '=', $p->product_id)
                ->first();
            if ($pro != null) {
                $pro->total = $pro->price * $p->total;
                array_push($bestsellers, $pro);
            }
        }
        $bestsellers = collect($bestsellers)->sortBy('total')->reverse()->toArray();
        return response()->json($bestsellers);
    }

    /**
     * Export orders to PDF
     */
    public function exportToExcel(Request $request)
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

}
