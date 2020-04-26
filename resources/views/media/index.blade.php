@extends('layouts.admin')

@section('content')

<div class="main-content list-post">
	@if( Session::get('post_msg') )
	<span class="msg-succs">{{ Session::get('post_msg') }}</span>
	@endif
	@if( Session::get('del_msg') )
	<span class="msg-error">{{ Session::get('del_msg') }}</span>
	@endif

	<div class="media">
		<select name="media-select" class="media-select">
			<option value="images">images</option>
			<option value="videos">videos</option>
		</select>
	</div>
	
	<div class="medias">
		<div class="medias-sec images-sec">
			@foreach($images AS $image)
			<span><img src="media/{{ $image['name'] }}" height="200px" width="250px"></span>
			@endforeach
		</div>

		<div class="medias-sec videos-sec" style="display:none">
			@foreach($videos AS $video)
			<span><img src="media/{{ $video['name'] }}" height="200px" width="250px"></span>
			@endforeach
		</div>
	</div>
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