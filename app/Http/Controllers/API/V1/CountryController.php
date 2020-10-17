<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class CountryController extends Controller {
    /**
     * Display a listing of the countries in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        $categories = Country::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created country in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_category = Country::create($request->all());
        return response()->json($new_category);
    }

    /**
     * Display the specified country from database
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = Country::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified country in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Country::findOrFail($id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified country from database.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);
    }
}
