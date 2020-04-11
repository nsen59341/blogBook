@extends('layouts.admin')

@section('content')

@include('includes.edit-modal')

<div class="main-content list-post">
	@if( Session::get('post_msg') )
	<span class="msg-succs">{{ Session::get('post_msg') }}</span>
	@endif
	<div class="text-right">
		{!! Form::open(['method'=>'get', 'route'=>'categories.create']) !!}
			<button class="btn btn-danger fa fa-plus" title="Add New Category"></button>
		{!! Form::close() !!}
	</div>
	<div class="table-responsive">
	  <table class="table">
	  	<caption>List of Categories</caption>
	    <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Category</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach( $categories AS $category )
		    <tr>
		      <th scope="row">{{ $category->id }}</th>
		      <td>{{ $category->name }}</td>
		      <td>
		      	{!! Form::open(['method'=>'delete', 'route'=>['categories.destroy',$category->id]]) !!}
		      	<button type="submit" class="btn btn-danger fa fa-trash" title="Delete Category"></button>
		      	{!! Form::close() !!}
		      	
		      	<button type="submit" class="btn btn-info fa fa-pencil edit-cat-btn" data-cat_id="{{ $category->id }}" data-cat_name="{{ $category->name }}" title="Edit Category Name" data-toggle="modal" data-target="#myModal"></button>
		      	
		      </td>
		    </tr>
		    @endforeach
		  </tbody>	  
		</table>
	</div>
</div>

<div class="pagntn-link">{{ $categories->links() }}</div>


@endsection

@section('scripts')
	
	<script type="text/javascript">

		$('#myModal').on('show.bs.modal', function(e) {

			var targt_url = "<?php echo url('categories'); ?>";
			 //get category id attribute of the clicked element
		    var catId = $(e.relatedTarget).data('cat_id');
		    var catName = $(e.relatedTarget).data('cat_name');
		    // console.log("catId: "+catId);
		    //populate the cat_id textbox
		    // $(e.currentTarget).find('input[name="catId"]').val(catId);
		    $(e.currentTarget).find('.edit-modal').attr("action", targt_url+"/"+catId);
		    $(e.currentTarget).find('input[name="name"]').val(catName);

		});

	</script>
	

@endsection