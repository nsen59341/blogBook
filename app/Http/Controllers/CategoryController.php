<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Category;

use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate('15') ;
        return view('category.list', compact('categories'));
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
        $category = Category::create($this->validateTask());
        $category->save();
        Session::flash('post_msg','The Category has been succesfully created');
        return redirect('/categories');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $category->update($this->validateTask());

        $category->save();

        Session::flash('post_msg','The Category name has been succesfully changed');

        return redirect('/categories');
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
        // dd($request->all());
        if( isset($request->delete_single) )
        {
            $id = $request->delete_single;
            $category = Category::findOrFail($id);
            $category->delete();
            Session::flash('del_msg','The Category has been succesfully deleted');
            return redirect('/categories') ;
        }
        if( isset($request->delete_multiple) && !empty($request->isChecked) )
        {
            $categories = Category::findOrFail($request->isChecked);
            foreach ($categories as $key => $category) {
                $category->delete();
            }
            Session::flash('del_msg','The selected Categories have been succesfully deleted');
            return redirect()->back();
        }
        else{
            Session::flash('del_msg','No Category has been selected');
            return redirect()->back();
        }
    }

    public function showPosts($id)
    {
        $posts = Post::where('category_id',$id)->paginate(10);
        // return $posts;
        return view('post.list', compact('posts'));
    }

    public function validateTask()
    {
        return request()->validate([
            'name' => 'required | unique:categories'
        ]);
    }

}
