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
						  <h3 class="box-title">Expenses</h3>
						</div>
						<div class="col-sm-4">
						  <a class="btn btn-primary" href="{{ route('expenses/create') }}">Add an Expenses</a>
						</div>
					</div>
				  </div>
				  <!-- /.box-header -->
				  
		 
			<div class='table-responsive'>
			  <table class="table table-bordered table-hover" style="border: 1px solid #ddd">
				<thead class="table table-striped" style="background-color:#337AB7;">
					<tr>
					  <td><b>ID</b></td>
					  <td><b>Expensed To</b></td>
					  <td><b>Expensed Date</b></td>
					  <td><b>Amount</b></td>
					  <td colspan="2" align=""><b>Action</b></td>
					</tr>
				</thead>
				<tbody>
					@foreach($Expenses as $expense)
					<tr>
						<td>{{$expense->id}}</td>
						<td>{{$expense->firstname}} {{$expense->lastname}}</td>
						<td><b>{{$expense->date_expensed}}</b></td>
						<td><b>{{$expense->expenses}}</b></td>
						<td width="100px" ><a href="{{ route('expenses/edit', $expense->id)}}" class="btn btn-primary">Update Expenses</a></td>
					</tr>
					@endforeach
				</tbody>
			  </table>
			</div>  
			<div class="card-footer bg-red">
			  {{$Expenses->links()}}
			  <b>Total Teams</b> {{$Expenses->count()}} </h1>
			</div>  
		<div>
@endsection
