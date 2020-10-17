<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class EurosoftAdController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class SliderController extends Controller
{
    /**
     * Display a listing of the Slider in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $data = Slider::latest()->paginate(25);
        $files = [];
        foreach ($data as $file) {
            array_push($files, env('APP_URL').Storage::url('app/public/sliders/'.$file->path));
        }
        return response()->json($files);
    }

    /**
     * Store a newly created slider in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

//        $this->validate($request, [
//            'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
//
//        ]);

        $data = [];

        if($request->hasFile('files'))
        {
            foreach($request->file('files') as $file)
            {
//                dd($file);
                $uuid = Str::uuid()->toString();
                $name = $uuid . time().'.'.$file->extension();
                $file->move(public_path('/sliders/'), $name);
                $fayl= Slider::create(['image_path'=>$name]);
                $data[] = $fayl;
            }
        }

        return response()->json($data);
    }

    /**
     * Display the specified slider from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $data = Slider::findOrFail($id);
        $pathToFile = public_path('../storage/app/public/sliders/'.$data->path);
        return response()->file($pathToFile);
    }

    /**
     * Remove the specified slider from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $file_data = Slider::findOrFail($id);
        File::delete(public_path('../storage/app/public/sliders/'.$file_data->path));
        $slider = Slider::destroy($id);
        return response()->json(null, 204);
    }
}
