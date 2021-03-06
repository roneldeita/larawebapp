<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Photo;
use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        //get all request and assigned it to a $input variable
        $input = $request->all();

        //pull the logged in user
        $user = Auth::user();

        //check if photo_id is exists
        if($file = $request->file('photo_id')){

            //naming the photo
            $name = time().'-'.$file->getClientOriginalName();

            //move photo to this location
            $file->move('images', $name);

            //save photo info to Photo table
            $photo = Photo::create(['file'=> $name]);

            //get the id of inserted photo
            $input['photo_id'] = $photo->id;

        }

        $user->posts()->create($input);

        return redirect('/admin/posts/');

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
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

         return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        //get all request and assigned it to a $input variable
        $input = $request->all();
       
        //check if photo_id is exists
        if($file = $request->file('photo_id')){

            //naming the photo
            $name = time().'-'.$file->getClientOriginalName();

            //move photo to this location
            $file->move('images', $name);

            //save photo info to Photo table
            $photo = Photo::create(['file'=> $name]);

            //get the id of inserted photo
            $input['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        Session::flash('updated_post','The post has been updated');

        return redirect('/admin/posts');

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

        unlink(public_path().$post->photo->file);

        $post->delete();
        
        Session::flash('deleted_post','The post has been deleted');

        return redirect('/admin/posts');
    }
}
