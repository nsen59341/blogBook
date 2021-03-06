@extends('layouts.admin')

@section('content')

<div class="main-content list-post">
	@if( Session::get('post_msg') )
	<span class="msg-succs">{{ Session::get('post_msg') }}</span>
	@endif
	<div class="text-right">
		{!! Form::open(['method'=>'get', 'route'=>'posts.create']) !!}
			<button class="btn btn-danger fa fa-plus" title="Add New Post"></button>
		{!! Form::close() !!}
	</div>
	@foreach($posts AS $post)
	<div class="each-post">
		<h2>{{ $post->title }}</h2>
		<span class="small-txt post-author">posted {{ $post->user->created_at->diffForHumans() }} by {{ $post->user->name }} </span>
		<br><br>
		<p class="post-body">{{ Str::limit($post->blog,200) }} <a href="{{ route('posts.show',$post->id) }}">read more...</a> </p>
	</div>
	@endforeach
</div>

<div class="pagntn-link">{{ $posts->links() }}</div>


@endsection