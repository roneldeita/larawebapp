@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Posts</h1>

	<div class="col-sm-10">
		<table class="table table-hover">
			<thead>
			      <tr>
			        <th>Photo ID</th>
			        <th>File</th>
			        <th>Created</th>
			      </tr>
			</thead>
			<tbody>

			    	@if($photos)

				      @foreach($photos as $photo)

				      	<tr>
				      		<td>{{ $photo->id }}</td>
				      		<td><img height="80" src="{{$photo->file}}" alt="{{$photo->file}}"></td>
				      		<td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "No timestamp" }}</td>
				      	</tr>

				      @endforeach

				    @endif

			</tbody>
		</table>
	</div>
@stop
