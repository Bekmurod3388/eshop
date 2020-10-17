<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Models\MyFavorite;
use App\Models\Rating;
use App\Models\RecentView;
use Illuminate\Http\Request;


/**
 * Class MyFavoriteController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class RecentViewController extends Controller
{
    /**
     * Display a listing of the recent views in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return response()->json(RecentView::latest()->paginate(25));
    }

    /**
     * Store a newly created recent view in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_recent_view = RecentView::create($request->all());
        return response()->json($new_recent_view);
    }

    /**
     * Display the specified recent view from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $recent_view = RecentView::findOrFail($id);
        return response()->json($recent_view);
    }

    /**
     * Update the specified recent view in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $recent_view = RecentView::findOrFail($id);
        $recent_view->update($request->all());
        return response()->json($recent_view);
    }

    /**
     * Remove the specified recent view from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $recent_view = RecentView::destroy($id);
        return response()->json("Successfully removed");
    }
}
