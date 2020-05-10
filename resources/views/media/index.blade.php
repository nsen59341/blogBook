@extends('layouts.admin')

@section('content')

<div class="main-content list-post">
	@if( Session::get('post_msg') )
	<span class="msg-succs">{{ Session::get('post_msg') }}</span>
	@endif
	@if( Session::get('del_msg') )
	<span class="msg-error">{{ Session::get('del_msg') }}</span>
	@endif

	@if(Auth::user()->role_id==1)
	<div class="text-right">
		{!! Form::open(['method'=>'get', 'route'=>'media.create']) !!}
			<button class="btn btn-danger fa fa-upload" title="Upload Media"></button>
		{!! Form::close() !!}
	</div>
	@endif

	{!! Form::open(['method'=>'delete', 'route'=>'media.delete', 'class'=>'btn-form']) !!}

	<div class="text-left">
		<button type="submit" name="delete_multiple" value="delete_multiple" class="btn btn-danger">Delete Selected</button>
	</div>

	<div class="media">
		<select name="media-select" class="media-select">
			<option value="images">images</option>
			<option value="videos">videos</option>
		</select>
	</div>
	
	<div class="medias">
		@if(!empty($images_number))
		<div class="medias-sec images-sec">
			@foreach($images AS $image)
			<input type="checkbox" name="images[]" value="{{ $image['id'] }}">
			<span><img src="media/{{ $image['name'] }}" height="200px" width="250px"></span>
			@endforeach
		</div>
		@else
			<div class="no-view" align="center">There are no image to view</div>
		@endif

		@if(!empty($videos_number))
		<div class="medias-sec videos-sec" style="display:none">
			@foreach($videos AS $video)
			<input type="checkbox" name="videos[]" value="{{ $video['id'] }}">
			<span><img src="media/{{ $video['name'] }}" height="200px" width="250px"></span>
			@endforeach
		</div>
		@else
			<div class="no-view" align="center">There are no video to view</div>
		@endif
	</div>

	{{ Form::close() }}

</div>


@endsection

@section('scripts')

<script type="text/javascript">
	$(".media-select").on('change', function() {
		$(".medias-sec").hide();
		$("."+$(this).val()+"-sec").show();
	});
</script>

@endsection