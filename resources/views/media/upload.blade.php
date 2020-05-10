@master

<form id="file-upload-form" class="uploader" action="{{route('media.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    @csrf
    <input id="file-upload" type="file" name="fileUpload" accept="image/*,video/*" >
    <label for="file-upload" id="file-drag">
        <img id="file-image" src="#" alt="Preview" class="hidden">
        <div id="start" >
            <i class="fa fa-download" aria-hidden="true"></i>
            <div>Select a file or drag here</div>
            <div id="notimage" class="hidden">Please select an image</div>
            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
            <br>
            <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </label>
</form>

@endmaster
