@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Categories</h1>

	@if(Session::has('deleted_category'))

		<p class="bg-danger">{{session('deleted_category')}}</p>

	@elseif(Session::has('updated_category'))

		<p class="bg-success">{{session('updated_category')}}</p>

	@endif

	<div class="row">
		
		<div class="col-sm-6">

			{!! Form::open(['route'=>'categories.store']) !!}
				
				<div class="form-group">
					{!! Form::label('name','Name:') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
			
		</div>

		<div class="col-sm-6">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Category ID</th>
			        <th>Name</th>
			        <th>Created</th>
			        <th>Updated</th>
			      </tr>
			    </thead>
			    <tbody>

			    	@if($categories)

				      @foreach($categories as $category)

				      	<tr>
				      		<td>{{ $category->id }}</td>
				      		<td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
				      		<td>{{ $category->created_at->diffForHumans() }}</td>
				      		<td>{{ $category->updated_at ? $category->updated_at->diffForHumans() : "No timestamp" }}</td>
				      	</tr>

				      @endforeach

				    @endif

			    </tbody>
			  </table>
		</div>

	</div>

	<div class="row">
		@include('includes.form_error')
	</div>

	

@endsection