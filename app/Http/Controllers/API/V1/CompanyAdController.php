<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\CompanyAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class CompanyAdController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class CompanyAdController extends Controller
{
    /**
     * Display a listing of the companyad in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $companyad = CompanyAd::all();
        return response()->json($companyad);
    }

    /**
     * Store a newly created companyad in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_company_ad = CompanyAd::create($request->all());
        return response()->json($new_company_ad);
    }

    /**
     * Display the specified Companyad from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $companyad= CompanyAd::findOrFail($id);
        return response()->json($companyad);
    }

    /**
     * Update the specified CompanyAd in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $companyad = CompanyAd::findOrFail($id);
        $companyad->update($request->all());
        return response()->json($companyad, 200);
    }


    /**
     * Remove the specified CompanyAd from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $companyad = CompanyAd::destroy($id);
    }
}
