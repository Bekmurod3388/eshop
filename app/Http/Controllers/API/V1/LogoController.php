<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\ShopDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class LogoController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class LogoController extends Controller
{
    /**
     * Display a listing of the Logo in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $data = Logo::latest()->paginate(25);
        $files = [];
        foreach ($data as $file) {
            array_push($files, env('APP_URL').Storage::url('app/public/logos/'.$file->path));
        }
        return response()->json($files);
    }

    /**
     * Store a newly created Logo in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        request()->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);
        $uuid = Str::uuid()->toString();
        $fileName = $uuid.'-'.time().'.'.$request->path->extension();
        $request->path->move(public_path('../storage/app/public/logos'), $fileName);
        $logo = Logo::create(['path' => $fileName]);
        return response()->json($logo);
    }

    /**
     * Display the specified Logo from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $data = Logo::findOrFail($id);
        $pathToFile = public_path('../storage/app/public/logos/'.$data->path);
        return response()->file($pathToFile);
    }

    /**
     * Remove the specified Logo from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $file_data = Logo::findOrFail($id);
        File::delete(public_path('../storage/app/public/logos/'.$file_data->path));
        $logo = Logo::destroy($id);
        return response()->json(null, 204);
    }
}
