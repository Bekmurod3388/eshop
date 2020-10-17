<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Favicon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class FaviconController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class FaviconController extends Controller
{
    /**
     * Display a listing of the Favicon in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $data = Favicon::latest()->paginate(25);
        $files = [];
        foreach ($data as $file) {
            array_push($files, env('APP_URL').Storage::url('app/public/Favicons/'.$file->path));
        }
        return response()->json($files);
    }

    /**
     * Store a newly created Favicon in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        request()->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);
        $uuid = Str::uuid()->toString();
        $fileName = $uuid.'-'.time().'.'.$request->path->extension();
        $request->path->move(public_path('../storage/app/public/favicons'), $fileName);
        $favicon = Favicon::create(['path' => $fileName]);
        return response()->json($favicon);
    }

    /**
     * Display the specified Favicon from database.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function show($id){
        $data = Favicon::findOrFail($id);
        $pathToFile = public_path('../storage/app/public/favicons/'.$data->path);
        return response()->file($pathToFile);
    }

    /**
     * Remove the specified Favicon from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $file_data = Favicon::findOrFail($id);
        File::delete(public_path('../storage/app/public/favicons/'.$file_data->path));
        $favicon = Favicon::destroy($id);
        return response()->json(null, 204);
    }
}
