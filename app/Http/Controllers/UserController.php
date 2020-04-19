<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;


use App\User;

use App\Medias;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id) ;
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->update($this->validateTask());
        $user->save();
        Session::flash('post_msg','The Profile has been succesfully updated');

        return redirect()->back();
    }

    public function profile_picture_update(Request $request,$id)
    {
        if($request->file('photo'))
        {
            $allowedextension = ['jpg','png','svg'];
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $filextn = $file->getClientOriginalExtension();
            if(in_array($filextn, $allowedextension))
            {
                if($file->move('media', $filename))
                {
                    $photo = Medias::findOrFail($id) ;
                    $photo->name = $filename ;
                    $photo->save();
                }
                
                return redirect()->back();
               
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserData()
    {
        return view('user.profile');
    }

   
    public function validateTask()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
    }

}
