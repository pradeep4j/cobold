@extends('layouts.default')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="panel panel-success">
<div class="panel-heading">List of All Expenses With Users</div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; text-align:center">
          {{ session()->get('success') }} 
      </h1>
    </div><br />
  @endif

	<div class='table-responsive'>
	  <table class="table table-bordered table-hover" style="border: 1px solid #ddd">
		<thead class="table table-striped" style="background-color:#337AB7;">
			<tr>
			  <td><b>ID</b></td>
			  <td><b>Picture</b></td>
			  <td><b>User</b></td>
			  <td><b>Expenses</b></td>
			</tr>
		</thead>
		<tbody>
			@foreach($User as $teams)
			<tr>
				<td>{{$teams->id}}</td>
				<td><img src="{{$teams->image}}" width="50px" height="50px"/></td>
				<td>{{$teams->firstname}} {{$teams->lastname}}</td>
				<td>{{$teams->expenses}}</td>
				
			</tr>
			@endforeach
		</tbody>
	  </table>
	</div>  
	<div class="card-footer bg-red">
	{{$User->links()}}
	  <b style="color:#000000">Total Records {{$User->count()}}</b> 
	</div>  
<div>
@endsection
