@extends('layouts.admin')

@section('content')

@include('includes.edit-modal')

@include('includes.add-modal')

<div class="main-content list-post">
	@if( Session::get('post_msg') )
	<span class="msg-succs">{{ Session::get('post_msg') }}</span>
	@endif
	@if( Session::get('del_msg') )
	<span class="msg-error">{{ Session::get('del_msg') }}</span>
	@endif
	<div class="text-right">
		<button class="btn btn-danger fa fa-plus" title="Add New Category" data-toggle="modal" data-target="#addModal"></button>
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
		      <td><a href="{{ url('categories/posts/'.$category->id) }}">{{ $category->name }}</a></td>
		      <td>
		      	{!! Form::open(['method'=>'delete', 'route'=>['categories.destroy',$category->id] , 'class'=>'btn-form']) !!}
		      	<button type="submit" class="btn btn-danger fa fa-trash" title="Delete Category"></button>
		      	{!! Form::close() !!}
		      	
		      	<button type="submit" class="btn btn-info fa fa-pencil edit-cat-btn" data-cat_id="{{ $category->id }}" data-cat_name="{{ $category->name }}" title="Edit Category Name" data-toggle="modal" data-target="#editModal"></button>
		      	
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

		$('#editModal').on('show.bs.modal', function(e) {

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

		// $(".edit-modal").submit(function(e) {
		// 	e.preventDefault();
		// });
		// $(".add-modal").submit(function(e) {
		// 	e.preventDefault();
		// });

	</script>
	

@endsection