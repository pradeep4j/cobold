@extends('layouts.default')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="panel panel-success">
		<div class="box" >
		  @if(session()->get('success'))
			<div class="alert alert-success">
			  <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; text-align:center">
				  {{ session()->get('success') }} 
			  </h1>
			</div><br />
		  @endif
				  <div class="box-header">
					<div class="row">
						<div class="col-sm-8">
						  <h3 class="box-title">Teams</h3>
						</div>
						<div class="col-sm-4">
						  <a class="btn btn-primary" href="{{ route('teams/create') }}">Add New Teammate</a>
						</div>
					</div>
				  </div>
				  <!-- /.box-header -->
				  
		 
			<div class='table-responsive'>
			  <table class="table table-bordered table-hover" style="border: 1px solid #ddd">
				<thead class="table table-striped" style="background-color:#337AB7;">
					<tr>
					  <td><b>ID</b></td>
					  <td><b>Picture</b></td>
					  <td><b>First Name</b></td>
					  <td><b>Last NAme</b></td>
					  <td><b>Email</b></td>
					  <td><b>Sex</b></td>
					  <td colspan="3" align=""><b>Action</b></td>
					</tr>
				</thead>
				<tbody>
					@foreach($User as $teams)
					<tr>
						<td>{{$teams->id}}</td>
						<td><img src="{{$teams->image }}" width="50px" height="50px"/></td>
						<td>{{$teams->firstname}}</td>
						<td>{{$teams->lastname}}</td>
						<td>{{$teams->email}}</td>
						@if($teams->sex=='1') 
						  <td>Male</td>
						@endif
						@if($teams->sex=='0') 
						  <td>Female</td>
						@endif
						<td><a href="{{ route('teams/edit', $teams->id)}}" class="btn btn-primary">Update</a></td>
						<td>
							<form action="{{ route('teams/destroy', $teams->id)}}" method="post">
								@csrf
								@method('POST')
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
				</td>
						
					</tr>
					@endforeach
				</tbody>
			  </table>
			</div>  
			<div class="card-footer bg-red">
			  {{$User->links()}}
			  <b align='center'>Total Teams</b> {{$User->count()}}
			</div>  
		<div>
@endsection
