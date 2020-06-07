<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Auth;

use App\Post;
use App\Category;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(10);
        $number = Post::count();
        // return $posts;
        return view('post.list', compact('posts','number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($this->validateTask());
        $post->save();
        Session::flash('post_msg','The Post has been succesfully created');
        
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id',$post->id)->get();
        $comments_count = Comment::where('post_id',$post->id)->count();
    
        return view('post.show', compact('post','comments','comments_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {

        $post->update($this->validateTask());

        // return $post;

        $post->save();

        Session::flash('post_msg','The Post has been succesfully updated');

        return redirect('/posts');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('del_msg','The Post has been succesfully deleted');
        return redirect('/posts');
    }

    public function validateTask()
    {
        return request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'category_id'=> 'required',
            'blog' => 'required'
        ]);
    }

}
