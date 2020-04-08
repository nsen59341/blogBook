@extends('layouts.admin')

@section('content')

<div class="main-content single-post">
	<h1>{{ $post->title }}</h1>
	<span class="small-txt post-author">posted {{ $post->user->created_at->diffForHumans() }} by {{ $post->user->name }} </span>
	<p class="post-single-body">{{ $post->blog }} </p>
	<div class="modification-link">
		{!! Form::open(['method'=>'get', 'route'=>['posts.edit',$post->id]]) !!}
		<button class="btn btn-warning edit-link">edit</button>
		{!! Form::close() !!}
		{!! Form::open(['method'=>'delete', 'route'=>['posts.destroy',$post->id]]) !!}
		<button type="submit" class="btn btn-danger delete-link">delete</button>
		{!! Form::close() !!}

	</div>
</div>

@endsection

