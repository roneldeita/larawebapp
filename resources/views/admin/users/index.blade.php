@extends('layouts.admin')

@section('content')
	
	@if(Session::has('deleted_user'))

		<p class="bg-danger">{{session('deleted_user')}}</p>

	@elseif(Session::has('updated_user'))

		<p class="bg-success">{{session('updated_user')}}</p>

	@endif

	<h1 class="page-header">Users</h1>

	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>User ID</th>
	        <th>Photo</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Ronel</th>
	        <th>Status</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>

	    	@if($users)

		      @foreach($users as $user)

		      	<tr>
		      		<td>{{ $user->id }}</td>
		      		<th><img height="50" src="{{ $user->photo ? $user->photo['file'] : 'http://placehold.it/100x100' }}"></th>
		      		<td><a href="{{ route('users.edit', $user->id)}}">{{ $user->name }}</a></td>
		      		<td>{{ $user->email }}</td>
		      		<td>{{ $user->role ? $user->role->name : "No role assigned" }}</td>
		      		<td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
		      		<td>{{ $user->created_at->diffForHumans() }}</td>
		      		<td>{{ $user->updated_at->diffForHumans() }}</td>
		      	</tr>

		      @endforeach

		    @endif

	    </tbody>
	  </table>

@endsection