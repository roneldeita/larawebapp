@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Categories</h1>

	<div class="row">

			{!! Form::model($category, ['method'=>'PATCH', 'route'=>['categories.update', $category->id]]) !!}				
				<div class="form-group">
					{!! Form::label('name','Name:') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}

			{!! Form::open(['method'=>'DELETE', 'route'=>['categories.destroy', $category->id]]) !!}

				<div class="form-group">

					{!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
					
				</div>
			
			{!! Form::close() !!}
			
	</div>

	<div class="row">
		@include('includes.form_error')
	</div>

	

@endsection