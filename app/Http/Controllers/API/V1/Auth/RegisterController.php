<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsersers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        return Validator::make($data, [
//            'username' => ['required','string','max:191'],
//            'first_name' => ['required','string','max:191'],
//            'last_name' => ['required','string','max:191'],
//            'phone' => ['required','string','unique:users,phone','regex:/^((\+|00)\d{1,3})?\d+$/'],
//            'email' => ['required_without:phone','string','email','unique:users,email'],
//            'password' => ['required','string','min:6','confirmed']
//        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $new_user = User::create($request->all());
        return response()->json($request->all());
    }

    public function users(){
        $users = User::all();
        return response()->json($users);
    }

    public function getUser($id){
        $user = User::where("id",$id);
        return response()->json($user);
    }

    protected function registered(Request $request, $user)
    {
        $tokenResult = $user->createToken('ApiPassToken');
        return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ], 201);
    }
}
