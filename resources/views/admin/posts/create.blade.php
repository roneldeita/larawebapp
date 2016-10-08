@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Create Post</h1>

	{!! Form::open(['method'=>'POST', 'route'=>['posts.store'], 'files'=>true]) !!}

	
	<div class="form-group">
		{!! Form::label('title','Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Category:') !!}
		{!! Form::select('category_id',[''=>'Choose a category'] + $categories, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id','Photo:') !!}
		{!! Form::file('photo_id', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control', 'size'=>'30x8']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

	<div class="row">
		@include('includes.form_error')
	</div>

@endsection