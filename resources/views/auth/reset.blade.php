Route::get('password/reset/{token}' , 'Auth\PasswordController@getReset');
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset password</div>
				<div class="panel-body">
					@if(session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
					@endif
					<form action="{{ url('/password/reset') }}" class="form-horizontal" method="POST" role="form">
						{{csrf_field()}}
						<input type="hidden" name="token" value="{{$token}}">
						<div class="form-group{{$errors->has('email') ? 'has-error' :''}}">
							<label for="email" class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" id="email" class="form-control" name="email" value="{{ $email or old('email')}}" required autofocus>
								@if($errors->has('email'))
								<span class="help-block"><strong>{{ $errors->first('email')}}</strong></span>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection