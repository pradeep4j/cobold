@extends('layouts.default')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Team Member Data</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('expenses/update',$Expenses->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="form-group{{ $errors->has('User') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">User</label>

                            <div class="col-md-6">
								<input id="members_id" type="hidden" class="form-control" name="members_id" value="{{ $Expenses->members_id }}">
						           <input id="" type="text" class="form-control" name="firstname" value="{{ $TeamMember->firstname }} {{$TeamMember->lastname}}" readonly autofocus>
                                
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Expenses</label>
                            <div class="col-md-6">
                                <input id="expenses" type="number" step="0.0001" maxlength=20 class="form-control" name="expenses" value="{{ $Expenses->expenses }}"  autofocus required>
                            </div>
                        </div>					
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Date Expensed</label>

                            <div class="col-md-6">
								 <div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="hiredDate" type="text" class="form-control pull-right" name="date_expensed" value="{{ $Expenses->date_expensed }}" required>
								</div>
                                
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
  <script>
        $(document).ready(function() {
        //Date picker
            $('#hiredDate').datepicker({
              autoclose: true,
              format: 'yyyy/mm/dd'
            });
        });
 </script>
@endpush
