<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Expenses;
use Auth;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$User = DB::table('users')
					->leftJoin('expenses','expenses.members_id','=','users.id')
					->where('expenses.id','<>','')
					->paginate(3);  
		//echo "<pre>";
		//print_r($User);
        return view('home',compact('User'));
    }
	public function load($name) {
		$path = storage_path().'/app/avatars/'.$name;
	    if (file_exists($path)) {
            return Response::download($path);
        }
    }

}
