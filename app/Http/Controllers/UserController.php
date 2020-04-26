<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;

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
        $users = User::paginate('10');
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->password = Hash::make($request->password) ;
        // return $request;
        $user = User::create($this->validateTaskAddtn());
        $user->save();
        Session::flash('post_msg','The User has been succesfully added');
        
        return redirect('/users');
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
        $user->update($this->validateTaskUpdtn());
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
                    $photo = Medias::create() ;
                    $photo->name = $filename ;
                    $photo->type = "image";
                    $photo->save();

                    $user = User::findOrFail($id);
                    $user->profile_pic_id = $photo->id;
                    $user->save();
                }
                Session::flash('post_msg','The Profile photo has been succesfully update');
             
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function delete(Request $request)
    {
        if( isset($request->delete_single) )
        {
            $id = $request->delete_single;
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('del_msg','The User has been succesfully removed');
            return redirect('/users');
        }

        if( isset($request->delete_multiple) && !empty($request->isChecked) )
        {
            $users = User::findOrFail($request->isChecked);

            foreach ($users as $key => $user) {
                $user->delete();
            }
            Session::flash('del_msg','The Selected Users have been succesfully removed');
            return redirect()->back();
        }
        else {
            Session::flash('del_msg','No User has been selected');
            return redirect()->back();
        }
    }

    public function getUserData()
    {
        return view('user.profile');
    }

   
    public function validateTaskAddtn()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }

    public function validateTaskUpdtn()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
    }

}
