@extends('layouts.admin')

@section('content')

<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img height="100px" width="120px" src="{{ url('media/edit.png') }}" alt="image"/>
				<h2>Edit Post</h2>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				{!! Form::open(['method'=>'post', 'route'=>'users.store']) !!}
				<div class="form-group">
				  <label class="control-label col-sm-3" for="title">Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="title" placeholder="Name" name="name" value="{{ old('name') }}">
					@error('name')
					<p class="error-msg">{{ $errors->first('name') }}</p>
					@enderror
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="blog">Email id:</label>
				  <div class="col-sm-10">
				  	<input type="email" class="form-control" id="email" placeholder="email id" name="email" value="{{ old('email') }}">
					@error('email')
					<p class="error-msg">{{ $errors->first('email') }}</p>
					@enderror
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="blog">Password:</label>
				  <div class="col-sm-10">
				  	<input type="password" class="form-control" id="password" placeholder="password" name="password" value="{{ old('password') }}">
					@error('password')
					<p class="error-msg">{{ $errors->first('password') }}</p>
					@enderror
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default"> add </button>
				  </div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection
