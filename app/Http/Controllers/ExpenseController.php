<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB; 
class ExpenseController extends Controller
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
        $Expenses = DB::table('users')
						->rightJoin('expenses','expenses.members_id','=','users.id')
						->paginate(3);  
        return view('expense-mgmt/index', compact('Expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$Users = User::all();
        return view('expense-mgmt/create',compact('Users'));
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
			'members_id' => 'required',
            'expenses' => 'required|max:20',
            'date_expensed' => 'required',
        ]);
		$validatedData['logged_user_id'] = Auth::id();
        $show = Expenses::create($validatedData);
        return redirect('/expenses')->with('success', 'Team members expenses is successfully stored!');
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
        //$Expenses = Expenses::findOrFail($id);
	
		$Expenses = Expenses::findOrFail($id);
		$TeamMember = User::findOrFail($Expenses->members_id);
        return view('expense-mgmt/edit', ['Expenses'=>$Expenses,'TeamMember'=>$TeamMember]);
    }

    /**
     * Update the specified resource in storage.Expenses
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		
        $validatedData = $request->validate([
			'members_id' => 'required',
            'expenses' => 'required|max:20',
            'date_expensed' => 'required',
        ]);
		//			echo "<pre>";
		//print_r($validatedData);
		
        $show = Expenses::whereId($id)->update($validatedData);
        return redirect('/expenses')->with('success', 'Team members expenses is successfully stored!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenses = Expenses::findOrFail($id);
        $expenses->delete();
        return redirect('/teams')->with('success', 'Team Members Expenses Data is successfully deleted');
    }
}
