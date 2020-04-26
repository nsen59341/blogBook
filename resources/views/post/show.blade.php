@extends('layouts.admin')

@section('content')

<div class="main-content single-post">
	<h1>{{ $post->title }}</h1>
	<span class="small-txt post-author">posted {{ $post->user->created_at->diffForHumans() }} by {{ $post->user->name }} </span>
	<p class="post-single-body">{{ $post->blog }} </p>
	@if(Auth::user()->role_id==1 || Auth::user()->role_id==$post->user->role_id)
	<div class="modification-link">
		{!! Form::open(['method'=>'get', 'route'=>['posts.edit',$post->id] , 'class'=>'btn-form']) !!}
		<button class="btn btn-warning edit-link">edit</button>
		{!! Form::close() !!}
		{!! Form::open(['method'=>'delete', 'route'=>['posts.destroy',$post->id] , 'class'=>'btn-form']) !!}
		<button type="submit" class="btn btn-danger delete-link">delete</button>
		{!! Form::close() !!}
	</div>
	@endif
</div>

@endsection

