@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Posts</h1>

	@if(Session::has('deleted_post'))

		<p class="bg-danger">{{session('deleted_post')}}</p>

	@elseif(Session::has('updated_post'))

		<p class="bg-success">{{session('updated_post')}}</p>

	@endif

	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Post ID</th>
	        <th>Category</th>
	        <th>Photo</th>
	        <th>Owner</th>
	        <th>Title</th>
	        <th>Body</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>

	    	@if($posts)

		      @foreach($posts as $post)

		      	<tr>
		      		<td>{{ $post->id }}</td>
		      		<td><img height="50" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/100x100' }}"></td>
		      		<td><a href="{{ route('posts.edit', $post->id)}}">{{ $post->user->name }}</a></td>
		      		<td>{{ $post->category ? $post->category->name : "Uncategorized"}}</td>
		      		<td>{{ $post->title }}</td>
		      		<td>{{ str_limit($post->body, 10) }}</td>
		      		<td>{{ $post->created_at->diffForHumans() }}</td>
		      		<td>{{ $post->updated_at->diffForHumans() }}</td>
		      	</tr>

		      @endforeach

		    @endif

	    </tbody>
	  </table>

@endsection