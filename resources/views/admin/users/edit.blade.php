@extends('layouts.admin')
@section('content')
	<h1>Edit {{ $user->name }}'s details</h1>
	<hr>
	<div class="row">
		<div class="col-md-10">
			{!! Form::model($user, ['route' => ['users.update', $user->id], 'files' => true, 'method' => 'PUT']) !!}
				<div class="form-group">
					{!! Form::label('name', "Name:", []) !!}
					{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', "Email:", []) !!}
					{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('role_id', "Role:") !!}
					{!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('isActive', "Status:", []) !!}
					{!! Form::select('isActive', [ 1 => "Active", 0 => "Inactive" ], $user->isActive, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('photo_id', "Status:", []) !!}
					{!! Form::file('photo_id', ['class' => 'btn btn-default']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Password:', []) !!}
					{!! Form::text('password', $user->password, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Update user details', ['class' => 'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@stop