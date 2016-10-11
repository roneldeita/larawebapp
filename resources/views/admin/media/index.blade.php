@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Posts</h1>

	@if(Session::has('deleted_photo'))

		<p class="bg-danger">{{session('deleted_photo')}}</p>

	@endif

	<div class="col-sm-10">
		<table class="table table-hover">
			<thead>
			      <tr>
			        <th>Photo ID</th>
			        <th>File</th>
			        <th>Created</th>
			        <td></td>
			      </tr>
			</thead>
			<tbody>

			    	@if($photos)

				      @foreach($photos as $photo)

				      	<tr>
				      		<td>{{ $photo->id }}</td>
				      		<td><img height="80" src="{{$photo->file}}" alt="{{$photo->file}}"></td>
				      		<td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "No timestamp" }}</td>
				      		<td>
				      			{!! Form::open(['method'=>'DELETE', 'route'=>['media.destroy', $photo->id]]) !!}

									<a class="form-group">

										{!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
												
									</a>
										
								{!! Form::close() !!}
				      		</td>
				      	</tr>

				      @endforeach

				    @endif

			</tbody>
		</table>
	</div>
@stop
