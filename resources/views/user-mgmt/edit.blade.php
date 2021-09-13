@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Team Member Data</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('teams/update',$User->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
							 @if(isset($User->firstname))
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $User->firstname }}" required autofocus>
							 @endif
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
							 @if(isset($User->lastname))
                                <input id="firstname" type="text" class="form-control" name="lastname" value="{{ $User->lastname }}" required autofocus>
							 @endif
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>
								<div class="col-md-6">
									 @if(isset($User->email))
										<input id="email" type="email" class="form-control" name="email" value="{{ $User->email }}" required autofocus>
									 @endif
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
                           
                        </div>
                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Sex </label>
							<div class="col-md-6">
								<label class="radio-inline"><input type="radio" class="radio" name="sex" value="1" {{$User->sex == '1' ?'checked': ''}}  required="required"/>Male</label>
								<label class="radio-inline"><input type="radio" class="radio" name="sex" value="0" {{$User->sex == '0' ?'checked': ''}} required="required"/>Female</label>
							</div>	
                        </div>		
				
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Picture</label>
                            <div class="col-md-6">
								<img src="../../{{$User->image }}" width="50px" height="50px"/>
                                <input type="file" class="form-control fileinput" data-show-upload="false" id="image" name="image" >
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
  <script type="text/javascript">
  	// for bootstrap file input
  	$(function(){
  		 $("input.fileinput").fileinput({
              allowedFileExtensions: ["jpg", "jpeg"], // set allowed file format
              maxFileSize: 3000, //set file size limit, 1000 = 1MB
          });
		  
  	});
  </script>
@endpush
