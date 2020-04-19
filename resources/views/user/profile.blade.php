@extends('layouts.admin')

@section('content')

@include('includes.edit-profile-pic')

<div class="main-content single-post row">
	<div class="col-md-6">
		<a href="javascript:void(0);" id="user_img" data-toggle="modal" data-target="#editProfilePic"><img src="media/{{ Auth::user()->media->name }}" height="300px" width="300px"></a>
	</div>
	<div class="col-md-6">
		<h1>{{ Auth::user()->name }}</h1>
		<span class="small-txt post-author"> {{ Auth::user()->role->name }} </span>
		<p class="post-single-body">
			<label>Email: </label>
			<span>{{ Auth::user()->email }}</span>
		</p>
		<p class="post-single-body">
			<label>Joined at: </label>
			<span>{{ Auth::user()->created_at }}</span>
		</p>
		<div class="modification-link">	
			{!! Form::open(['method'=>'get', 'route'=>['users.edit', Auth::user()->id]]) !!}
			<button class="btn btn-warning edit-link">edit</button>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection

@section('scripts')
	
	<script type="text/javascript">

		$('#editProfilePic').on('show.bs.modal', function(e) {

		});


	</script>
	

@endsection

