@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Teammate</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('expenses/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Expensed To</label>

                            <div class="col-md-6">
                                <select id="members_id" type="text" class="form-control" name="members_id"  autofocus required="required">
									<option value="" >Please Select a User From List</option>
								@foreach($Users as $teams)
									<option value="{{$teams->id}}">{{$teams->firstname}} {{$teams->lastname}}</option>
								@endforeach
								</select>
                                @if ($errors->has('members_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('members_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Expenses</label>
                            <div class="col-md-6">
                                <input id="expenses" type="number" step="0.0001" maxlength="5" class="form-control" name="expenses" value="{{ old('expenses') }}"  placeholder='Please insert values in Rs. upto four decimal point' autofocus required>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('members_id') }}</strong>
                                    </span>
                            </div>
                        </div>						
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Date Expensed</label>

                            <div class="col-md-6">
								 <div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="hiredDate" type="text" class="form-control pull-right" name="date_expensed" value="{{ old('date_expensed') }}" required>
								</div>
                                @if ($errors->has('date_expensed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_expensed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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