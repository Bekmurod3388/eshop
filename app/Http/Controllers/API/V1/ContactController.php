<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class ContactController
 * @package App\Http\Controllers\API\V1
 * @author Bekmurod Khujamuratov
 */

class ContactController extends Controller
{
    /**
     * Display a listing of the contact in database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){

            $contact= Contact::all();
            return response()->json($contact);
        }


    /**
     * Store a newly created contact in database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $new_contact = Contact::create($request->all());
        return response()->json($new_contact);
    }

    /**
     * Display the specified contact from database.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $contact= Contact::findOrFail($id);
        return response()->json($contact);
    }

    /**
     * Update the specified contact in database.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return response()->json($contact, 200);
    }


    /**
     *Remove the specified contact from database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $contact = Contact::destroy($id);
    }
}
