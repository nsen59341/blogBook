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
				{!! Form::open(['method'=>'post', 'route'=>'posts.store']) !!}
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				<div class="form-group">
				  <label class="control-label col-sm-3" for="title">Title:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
					@error('title')
					<p class="error-msg">{{ $errors->first('title') }}</p>
					@enderror
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="category">Select Category:</label>
				  <div class="col-sm-10">          
					<select  class="form-control" id="category" name="category_id">
						@foreach($categories AS $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					@error('category')
					<p class="error-msg">{{ $errors->first('category') }}</p>
					@enderror
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="blog">Post:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="blog" name="blog">{!! old('blog') !!}</textarea>
					@error('blog')
					<p class="error-msg">{{ $errors->first('blog') }}</p>
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
