@extends('layouts.admin')

@section('content')

@include('includes.edit-profile-pic')

<div class="main-content list-post">
	
	@if( Session::get('del_msg') )
	<span class="msg-error">{{ Session::get('del_msg') }}</span>
	@endif
	@if(Auth::user()->role_id==1)
	<div class="text-right">
		{!! Form::open(['method'=>'get', 'route'=>'users.create']) !!}
			<button class="btn btn-danger fa fa-plus" title="Add New User"></button>
		{!! Form::close() !!}
	</div>
	@endif

	{!! Form::open(['method'=>'delete', 'route'=>'users.delete', 'class'=>'btn-form']) !!}
	<div class="text-left">
		<button type="submit" name="delete_multiple" value="delete_multiple" class="btn btn-danger">Delete Selected</button>
	</div>
	<div class="table-responsive">
	  <table class="table">
	  	<caption>List of Users</caption>
	    <thead>
		    <tr>
		      <th>&nbsp</th>
		      <th scope="col">DP</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Joined at</th>
		      @if(Auth::user()->role_id==1)
		      <th scope="col">Action</th>
		      @endif
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach( $users AS $user )
		    <tr>
		      <td>
		      	{!! Form::checkbox('isChecked[]', $user->id) !!}
		      </td>
		      <td><a href="javascript:void(0);" id="user_img" data-toggle="modal" data-target="#editProfilePic"><img src="media/{{ $user->media->name }}" height="40px" width="40px"></a></td>
		      <td>{{ $user->name }}</td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->created_at->diffForHumans() }}</td>
		      @if(Auth::user()->role_id==1)
		      <td>
		     	<!-- <input type="hidden" name="user_id" value="{{$user->id}}"> -->
		      	<button type="submit" name="delete_single" class="btn btn-danger fa fa-trash" title="Delete Category" value="{{ $user->id }}"></button>
		      
		      	{!! Form::open(['method'=>'get', 'route'=>['users.edit',$user->id], 'class'=>'btn-form edit-form']) !!}
		      	<button type="button" class="btn btn-info fa fa-pencil edit-user-btn" title="Edit User Name" value="{{ $user->id }}"></button>
		      	{!! Form::close() !!}

		      </td>
		      @endif
		    </tr>
		    @endforeach
		  </tbody>	  
		</table>
	</div>
	{!! Form::close() !!}
</div>

<div class="pagntn-link">{{ $users->links() }}</div>


@endsection


@section('scripts')

<script type="text/javascript">

	$(".edit-user-btn").on('click', function(event) {

		// console.log(event.target.value);

		var id = event.target.value;

		location.href = "/users/edit/"+id ;

	});
	
</script>


@endsection