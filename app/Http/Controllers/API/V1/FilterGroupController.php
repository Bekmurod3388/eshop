<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Models\FilterGroup;

/**
 * Class ManufacturerController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class FilterGroupController extends Controller
{
    /**
     * Display a listing of the filter group in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response()->json(FilterGroup::all());
    }

    /**
     * Store a newly created filter group in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_filer_group = FilterGroup::create($request->all());
        return response()->json($new_filer_group);
    }

    /**
     * Display the specified filter group from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $filter_group = FilterGroup::findOrFail($id);
        return response()->json($filter_group);
    }

    /**
     * Update the specified filter group in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $filter_group = FilterGroup::findOrFail($id);
        $filter_group->update($request->all());
        return response()->json($filter_group);
    }

    /**
     * Remove the specified filter group from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $filter_group = Filter::destroy($id);
        return response()->json("Successfully removed");
    }
}
