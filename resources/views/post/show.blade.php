@extends('layouts.admin')

@section('content')

<div class="main-content single-post">
	<h1>{{ $post->title }}</h1>
	<span class="small-txt post-author">posted {{ $post->user->created_at->diffForHumans() }} by {{ $post->user->name }} </span>
	<p class="post-single-body">{!! $post->blog !!} </p>
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

	<!-- Comments -->
	<div class="comment-list">
		<h2><u>Comments</u></h2>
		@if(!empty($comments_count))
		<div class="row">	
			@foreach($comments AS $comment)
				@if(!empty($comment->user))
				<div class="single-comment col-sm-10">
					<h5>{{ $comment->user->name }}</h5>
					<span class="content-{{$comment->id}}" contenteditable="false">{!! Str::limit($comment->comment,120) !!}</span>
					@if( $comment->user_id == Auth::user()->id )
						<div class="modification-link" align="right">
							{!! Form::open(['method'=>'post', 'route'=>['comment.edit',$comment->id], 'class'=>'btn-form form-editable-'.$comment->id]) !!}

							<input type="hidden" name="comment" class="comment-editable-{{$comment->id}}">
							<button type="button" data-id="{{$comment->id}}" class="btn btn-warning edit-link">edit</button>
							{!! Form::close() !!}
							{!! Form::open(['method'=>'delete', 'route'=>'comment.delete' , 'class'=>'btn-form']) !!}
							<input type="hidden" name="comment-id" value="{{$comment->id}}">
							<button type="submit" class="btn btn-danger delete-link">delete</button>
							{!! Form::close() !!}
						</div>
					@endif
				</div>
				@endif
			@endforeach
		</div>
		@else
			<div class="not-found-small" align="left"><i>No comment is for the post</i></div>
		@endif
	</div>
	
	<!-- end comments -->

	<!-- Add comment -->

	<div class="comment-heading"><u>Leave a comment</u></div>

	{!! Form::open(['method'=>'post', 'route'=>'comments.create']) !!}

	<input type="hidden" name="post_id" value="{{ $post->id }}">
	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('comment',null,['class'=>'form-control', 'row'=>3]) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

	<!-- end Add comment -->

</div>

@endsection

@section('scripts')

<script type="text/javascript">
	
	var id;

	$(".edit-link").on('click', function() {
		id = $(this).data('id');
		// console.log(id);
		$(".content-"+id).attr('contenteditable', true);
	});
	
	$(".comment-list").on('keypress', function(e) {
		var keyCode = e.keyCode || e.which;
	    if (keyCode === 13) { 
	    	var content = $(".content-"+id).text();
	    	$(".comment-editable-"+id).val(content);
	    	$(".form-editable-"+id).submit();
	        // console.log(content);
	        e.preventDefault();
            return false;
	    }
	});

</script>

@endsection

