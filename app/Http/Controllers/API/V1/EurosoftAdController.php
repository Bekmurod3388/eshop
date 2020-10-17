<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\EurosoftAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class EurosoftAdController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class EurosoftAdController extends Controller
{
    /**
     * Display a listing of the EurosoftAd in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $data = EurosoftAd::latest()->paginate(25);
        $files = [];
        foreach ($data as $file) {
            array_push($files, env('APP_URL').Storage::url('app/public/eurosoft_ads/'.$file->path));
        }
        return response()->json($files);
    }

    /**
     * Store a newly created EurosoftAd in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        request()->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);
        $uuid = Str::uuid()->toString();
        $fileName = $uuid.'-'.time().'.'.$request->path->extension();
        $request->path->move(public_path('../storage/app/public/eurosoft_ads'), $fileName);

        $path = EurosoftAd::create(['path' => $fileName]);
        return response()->json($path);
    }

    /**
     * Display the specified EurosoftAd from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $data = EurosoftAd::findOrFail($id);
        $pathToFile = public_path('../storage/app/public/eurosoft_ads/'.$data->path);
        return response()->file($pathToFile);
    }

    /**
     * Remove the specified EurosoftAd from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $file_data = EurosoftAd::findOrFail($id);
        File::delete(public_path('../storage/app/public/eurosoft_ads/'.$file_data->path));
        $company_ad = EurosoftAd::destroy($id);
        return response()->json(null, 204);
    }
}
