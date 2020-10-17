<?php

namespace App\Http\Controllers\API\V1;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ProductController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ProductController extends Controller
{
    /**
     * Display a listing of the products in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) {
        $products = Product::latest();
        $columns = [
            'code', 'model', 'name', 'stock', 'stock_status_id', 'image', 'manufacturer_id', 'category_id', 'price',
            'standard_price', 'special_price', 'discount_price', 'actions', 'status', 'not_exist', 'promotion', 'new', 'free_delivery',
            'sale', 'visibility', 'luxury', 'action', 'novelty', 'tip', 'top', 'our_recommendation', 'age', 'minimum',
            'sort_order', 'short_description', 'viewed'];

        //Get request params
        $params = json_decode($request->getContent(), true);
        if(!is_null($params)) {
            foreach ($params as $key => $value) {
                if (array_search($key, $columns))
                    $products = $products->where($key, $value);
            }
        }
        $products = $products->paginate(25);
        return response()->json($products);
	}

    /**
     * Store a newly created product in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate(Product::$validationRules);
        $uuid = Str::uuid()->toString();
        $all_data = $request->all();
        $fileName = $uuid.'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('../storage/app/public/products'), $fileName);
        $all_data->image = 'storage/app/public/products'.$fileName;
        $new_product = Product::create($all_data);
        return response()->json($new_product);
    }

    /**
     * Display the specified product from database
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update the specified product in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        //$product_data = $request->validate(Product::$validationRules);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * Remove the specified product from database.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $file_data = Product::findOrFail($id);
        File::delete(public_path('../storage/app/public/products/'.$file_data->image));
        Product::destroy($id);
        return response()->json('Product deleted successfully', 204);
    }

    /**
     * Fetch all new products from the database
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewProducts()
    {
        $product = Product::where('new', 1)
            ->orderBy('created_at', 'DESC')
            ->latest()->paginate(10);
        return response()->json($product);
    }

    /**
     * Fetch all our recommended products from the database
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOurRecommendations()
    {
        $product = Product::where('our_recommendation', 1)
            ->latest()->paginate(10);
        return response()->json($product);
    }

    /**
     * Fetch all promoted products from the database
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPromotions()
    {
        $product = Product::where('promotion', 1)
            ->latest()->paginate(10);
        return response()->json($product);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportToExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import()
    {
        Excel::import(new ProductsImport,request()->file('file'));
        return back();
    }
}
