<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class CategoryController extends Controller {
    /**
     * Display a listing of the categories in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
	public function index(Request $request) {
        $categories = Category::latest();
        if($request->name != null){
            $categories = $categories->where("name",$request->name);
        }
        if($request->parent_id != null){
            $categories = $categories->where("parent_id",$request->parent_id);
        }
        if($request->top != null){
            $categories = $categories->where("top",$request->top);
        }
        if($request->sort_order != null){
            $categories = $categories->where("sort_order",$request->sort_order);
        }
        if($request->status != null){
            $categories = $categories->where("status",$request->status);
        }

        $categories  = $categories->paginate(25);

        return response()->json($categories);
    }


    /**
     * Store a newly created category in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_category = Category::create($request->all());
        return response()->json($new_category);
    }

    /**
     * Display the specified category from database
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified category in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified category from database.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);
    }
}
