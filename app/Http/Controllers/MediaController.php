<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\File;

use App\Medias;

use App\User;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Medias::where('type','image')->get()->toArray() ;
        $videos = Medias::where('type','video')->get()->toArray() ;

        $images_number = Medias::where('type','image')->count();
        $videos_number = Medias::where('type','video')->count();

        return view('media.index', compact('images','videos','images_number','videos_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fileUpload' => 'required|mimetypes:video/mp3,video/mp4,video/avi,video/mpeg,video/quicktime,image/png,image/jpg,image/jpeg,image/svg|max:60000000' 
        ]);

        if($file=$request->file('fileUpload'))
        {
            $destination = 'media';
            $filename = $file->getClientOriginalName();
            $mime_type = $file->getMimeType();
            $mime_type_arr = explode('/', $mime_type);
            $video_type = $mime_type_arr[0];
            if($file->move($destination, $filename))
            {
                $photo = Medias::create();
                $photo->name = $filename ;
                $photo->type = $video_type;
                $photo->save();
                Session::flash('post_msg','The ' . $video_type . ' has been succesfully uploaded');
            }
            
        }
        return redirect('/medias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if( !empty($request->images) )
        {
            $images = Medias::findOrFail($request->images);
            foreach ($images as $key => $image) {
                $img_name = $image->name;
                if( !empty(User::where('profile_pic_id',$image->id)) )
                {
                    $user = User::where('profile_pic_id',$image->id)->update(['profile_pic_id' => 1]);
                }
                File::delete('media/'.$img_name);
                $image->delete();
            }
            Session::flash('del_msg','The Selected Images have been succesfully deleted');
            return redirect()->back();
        }
       
        else if( !empty($request->videos) )
        {
            $videos = Medias::findOrFail($request->videos);
            foreach ($videos as $key => $video) {
                $vdo_name = $video->name;
                File::delete('media/'.$vdo_name);
                $video->delete();
            }
            Session::flash('del_msg','The Selected Videos have been succesfully deleted');
            return redirect()->back();
        }
        else {
            Session::flash('del_msg','No Image/Video has been selected');
            return redirect()->back();
        }
    }

    
}
