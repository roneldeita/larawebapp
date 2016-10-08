@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Create Users</h1>

	<!--{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}-->
	{!! Form::open(['method'=>'POST', 'route'=>['users.store'], 'files'=>true]) !!}

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
			{!! Form::submit('Save User', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

	@include('includes.form_error')

@endsection

