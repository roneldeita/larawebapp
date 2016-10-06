<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        //get all request and assigned it to a $input variable
        $input = $request->all();

        //check if photo_id is exists
        if($file = $request->file('photo_id')){

            //naming the photo
            $name = time().'-'.$file->getClientOriginalName();

            //move photo to this location
            $file->move('images/users_photo', $name);

            //save photo info to Photo table
            $photo = Photo::create(['file'=> $name]);

            //get the id of inserted photo
            $input['photo_id'] = $photo->id;

        }

        //encrypt password
        $input['password'] = bcrypt(trim($request->password));

        //save the details to the User table
        User::create($input);

        //finally redirect to users list
        return redirect('/admin/users');

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
        
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {

        $user =User::findOrFail($id);

        //password
        if(trim($request->password) == '' ){

            $input = $request->except('password');

        }else{
 
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        //is_active
        if($request->is_active == 1){

            $input['is_active']=1;

        }else{

            $input['is_active']=0;
            
        }

        if($file = $request->file('photo_id')){

            $name = time().'-'.$file->getClientOriginalName();

            $file->move('images/users_photo', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }



        $user->update($input);

        return redirect('/admin/users');


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
}
