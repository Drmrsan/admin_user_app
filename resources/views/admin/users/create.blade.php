@extends('layouts.admin')
@section('content')
	<h1>Create new User</h1>
	<hr>
	<div class="row">
		<div class="col-md-10">
			{!! Form::open(['route' => 'users.store', 'files' => true]) !!}
				<div class="form-group">
					{!! Form::label('name', "Name:", []) !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', "Email:", []) !!}
					{!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('role_id', "Role:") !!}
					{!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('isActive', "Status:", []) !!}
					{!! Form::select('isActive', [ 1 => "Active", 0 => "Inactive" ], null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('photo_id', "Status:", []) !!}
					{!! Form::file('photo_id', ['class' => 'btn btn-default']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Password:', []) !!}
					{!! Form::text('password', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@stop