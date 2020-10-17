<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\CatchOfDay;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CatchOfDayController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class CatchOfDayController extends Controller {
    /**
     * Display a listing of the catch of day in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
	public function index() {
        $catch_of_day = CatchOfDay::all();
		return response()->json($catch_of_day);
    }

    /**
     * Store a newly created catch of day in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_catch_of_day = CatchOfDay::create($request->all());
        return response()->json($new_catch_of_day);
    }

    /**
     * Display the specified catch of day from database
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $catch_of_day = CatchOfDay::findOrFail($id);
        return response()->json($catch_of_day);
    }

    /**
     * Update the specified catch of day in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatchOfDay  $catch_of_day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catch_of_day = CatchOfDay::findOrFail($id);
        $catch_of_day->update($catch_of_day);
        return response()->json($catch_of_day, 200);
    }

    /**
     * Remove the specified catch of day from database.
     *
     * @param  \App\Models\CatchOfDay  $catch_of_day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catch_of_day = CatchOfDay::destroy($id);
    }
}
