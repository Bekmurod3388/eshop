<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

/**
 * Class BannerController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class BannerController extends Controller {
    /**
     * Display a listing of the banners in database
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
	public function index() {
        $banner = Banner::all();
		return response()->json($banner);
    }

    /**
     * Store a newly created banners in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $new_banner = Banner::create($request->all());
        return response()->json($new_banner);
    }

    /**
     * Display the specified banners from database
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $banner= Banner::findOrFail($id);
        return response()->json($banner);
    }

    /**
     * Update the specified banners in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $banner->update($request->all());
        return response()->json($banner, 200);
    }

    /**
     * Remove the specified banners from database.
     *
     * @param  \App\V1\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::destroy($id);
    }
}
