<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ShoppingCartController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the shopping carts in session
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        $shopping_cart = \Cart::getContent();
        return response()->json($shopping_cart);
	}

    /**
     * Store a newly created shopping cart in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $shopping_cart = \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug,
            )
        ));
        return response()->json($shopping_cart);
    }

    /**
     * Display the specified shopping cart from session
     *
     * @param  \App\Models\ShoppingCart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $shopping_cart = \Cart::where("id",$id);
        return response()->json($shopping_cart);
    }

    /**
     * Update the specified shopping cart in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingCart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shopping_cart = \Cart::where("id",$id);
        $shopping_cart->update($request->all());
        return response()->json($shopping_cart, 200);
    }
    /**
     * Clear shopping cart from session
     */
    public function clear(){
        \Cart::clear();
        return response()->json("Cleared shopping cart");
    }


    /**
     * Remove the specified shopping cart from session.
     *
     * @param  \App\Models\ShoppingCart  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);
        return response()->json("Removed from shopping cart", 204);
    }

}
