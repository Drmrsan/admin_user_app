@extends('layouts.admin')
@section('content')
	<div class="page-header">
		<h1>Admin Users index page</h1>
		<a href="{{ route('users.create') }}" class="btn btn-success btn-sm pull-right">Create new User</a>
	</div>
	<div class="row">
		<div class="col-md-10">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Status</th>
						<th>Created at</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role->display_name }}</td>
							<td>{{ $user->isActive == 1 ? "Active" : "Inactive" }}</td>
							<td>{{ $user->created_at->diffForHumans() }}</td>
							<td>
								<a href="{{ route('users.show', $user->id) }}" class="btn btn-default btn-xs">Details</a> <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-xs">Edit</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop