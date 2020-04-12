<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <!-- <div class="contact-form"> -->
        {!! Form::open(['method'=>'put', 'class'=>'edit-modal', 'route'=>['categories.update',1]]) !!}
        <div class="form-group">
          <label class="control-label col-sm-3" for="title">Name:</label>
          <div class="col-sm-10">          
          <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
          @error('name')
          <p class="error-msg">{{ $errors->first('name') }}</p>
          @enderror
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default"> update </button>
          </div>
        </div>
        {!! Form::close() !!}
      <!-- </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>