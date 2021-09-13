<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Response;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
class TeamController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//		dd(Auth::id());
        $User = DB::table('users')
					//->leftJoin('expenses','expenses.members_id','=','users.id')
					//->where('expenses.id','<>','')
					->paginate(3);  
		//echo "<pre>";
		//print_r($User);
        return view('user-mgmt/index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::findOrFail($id);
		//echo "<pre>";
		//print_r($User);
		//die;
        return view('user-mgmt/edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required||max:255',
            'sex' => 'required',
		    //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
		
		if ($request->file('image')) {
            $path = $request->file('image')->store('avatars');
			$validatedData['image'] = $path;
        }
        User::whereId($id)->update($validatedData);
        return redirect('/teams')->with('success', 'Team Members Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect('/teams')->with('success', 'Team Member is successfully deleted');

    }
	    /**
     * Load image resource.
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
