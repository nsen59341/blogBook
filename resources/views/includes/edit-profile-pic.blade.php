<div id="editProfilePic" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">      
        {!! Form::open(['method'=>'put', 'class'=>'edit-profile-pic', 'route'=>['profile_picture.update', Auth::user()->id ], 'files'=>true]) !!}
        <div class="form-group">
          <div class="col-sm-12"> 
            <img src="media/{{ Auth::user()->media->name }}" height="100%" width=100%">
          </div> 
        </div>
        <div class="form-group">  
          <div class="col-sm-6">
            <center><input type="file" name="photo" id="photo"></center>
          </div>
          <br>
          <div class="col-sm-6"><button type="submit">change</button></div>      
        </div>  
        {!! Form::close() !!}  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>