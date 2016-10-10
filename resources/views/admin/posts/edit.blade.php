@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Edit Post</h1>

	{!! Form::model($post, ['method'=>'PATCH', 'route'=>['posts.update', $post->id], 'files'=>true]) !!}

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
		{!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

	{!! Form::open(['method'=>'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}

		<div class="form-group">

			{!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
					
		</div>
			
	{!! Form::close() !!}

	<div class="row">
		@include('includes.form_error')
	</div>


@endsection