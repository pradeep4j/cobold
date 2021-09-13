<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
	public function index()
    {
		return view('auth/register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sex' => ['required'],
            'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:3000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
		$validatedData = $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|max:255|unique:users',
			'password' => 'required', 'string', 'min:8',
            'sex' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
		//dd('--');
        $input = $request->all();
		$validatedData['password'] = Hash::make($input['password']);
		$path = $request->file('image')->store('avatars'); // both above and this way images are uploded. It will save files to storage/app/avatars folder
		$validatedData['image'] = $path;
        $show = User::create($validatedData);
        return redirect('/teams')->with('success', 'Team member is successfully Created!');
    }
	/* Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
		$path = storage_path().'/app/avatars/'.$name;
	    if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
