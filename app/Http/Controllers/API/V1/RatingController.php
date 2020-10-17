<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Models\Rating;
use Illuminate\Http\Request;


/**
 * Class RatingController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class RatingController extends Controller
{
    /**
     * Display a listing of the ratings in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(Rating::all());
    }

    /**
     * Store a newly created rating in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_rating = Rating::create($request->all());
        return response()->json($new_rating);
    }

    /**
     * Display the specified rating from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $rating = Rating::findOrFail($id);
        return response()->json($rating);
    }

    /**
     * Update the specified rating in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $rating = Rating::findOrFail($id);
        $rating->update($request->all());
        return response()->json($rating);
    }

    /**
     * Remove the specified rating from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $rating = Rating::destroy($id);
        return response()->json("Successfully removed");
    }
}
