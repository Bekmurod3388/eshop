<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ShopAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class ShopAdController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ShopAdController extends Controller
{
    /**
     * Display a listing of the ShopAds in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $data = ShopAd::latest()->paginate(25);
        $files = [];
        foreach ($data as $file) {
            array_push($files, env('APP_URL').Storage::url('app/public/shop_ads/'.$file->path));
        }
        return response()->json($files);
    }

    /**
     * Store a newly created ShopAd in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        request()->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);
        $uuid = Str::uuid()->toString();
        $fileName = $uuid.'-'.time().'.'.$request->path->extension();
        $request->path->move(public_path('../storage/app/public/shop_ads'), $fileName);

        $path = ShopAd::create(['path' => $fileName]);
        return response()->json($path);
    }

    /**
     * Display the specified ShopAd from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $data = ShopAd::findOrFail($id);
        $pathToFile = public_path('../storage/app/public/shop_ads/'.$data->path);
        return response()->file($pathToFile);
    }

    /**
     * Update the specified ShopAd in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */



    /**
     * Remove the specified ShopAd from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $file_data = ShopAd::findOrFail($id);
        File::delete(public_path('../storage/app/public/shop_ads/'.$file_data->path));
        $shop_ad = ShopAd::destroy($id);
        return response()->json(null, 204);
    }
}
