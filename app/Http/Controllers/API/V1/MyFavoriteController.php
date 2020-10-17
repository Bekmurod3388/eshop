<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Models\MyFavorite;
use App\Models\Rating;
use Illuminate\Http\Request;


/**
 * Class MyFavoriteController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class MyFavoriteController extends Controller
{
    /**
     * Display a listing of the my favorites in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(MyFavorite::all());
    }

    /**
     * Store a newly created my favorite in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_my_favorite = MyFavorite::create($request->all());
        return response()->json($new_my_favorite);
    }

    /**
     * Display the specified my favorite from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $my_favorite = MyFavorite::findOrFail($id);
        return response()->json($my_favorite);
    }

    /**
     * Update the specified my favorite in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $my_favorite = MyFavorite::findOrFail($id);
        $my_favorite->update($request->all());
        return response()->json($my_favorite);
    }

    /**
     * Remove the specified my favorite from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $my_favorite = MyFavorite::destroy($id);
        return response()->json("Successfully removed");
    }
}
