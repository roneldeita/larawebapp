@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Edit Users</h1>

	<div class="row">

		<div class="col-sm-3">
			
			<img class="img-responsive img-rounded" src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}">

		</div>

		<div class="col-sm-9">

			<!-- {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!} -->
			{!! Form::model($user, ['method'=>'PATCH', 'route'=>['users.update', $user->id], 'files'=>true]) !!}
			
				<div class="form-group">
					{!! Form::label('name','Name') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email','Email') !!}
					{!! Form::text('email', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('role','Role') !!}
					{!! Form::Select('role_id', [''=>'Choose an option'] + $roles, null,['class'=>'form-control'] ) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password','Password') !!}
					{!! Form::password('password', ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password_confirmation','Confirm Password') !!}
					{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('photo_id', 'User Photo') !!}
					{!! Form::file('photo_id', ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					<div class="checkbox">
					<label>{!! Form::checkbox('is_active') !!} <strong>Status</strong></label>
					</div>
				</div>

				<div class="form-group">

					{!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
					
				</div>

			{!! Form::close() !!}

			{!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}

				<div class="form-group">

					{!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
					
				</div>
			
			{!! Form::close() !!}

		</div>

	</div>

	<div class="row">

		@include('includes.form_error')

	</div>
	
@endsection

