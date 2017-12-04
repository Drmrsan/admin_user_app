<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Image;
use Session;
use Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::pluck('display_name', 'id');
        return view('admin.users.create')->withRoles($roles);
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
            'name' =>  'required',
            'email' => 'required|email|unique:users',
            'isActive' => 'required',
            'role_id' => 'required',
            'password' => 'required'
        ]);
        // Upload a user image
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $image = Image::create(['path'=>$name]);
            $request->image_id = $image->id;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'isActive' => $request->isActive,
            'role_id' => $request->role_id,
            'image_id' => $request->image_id,
            'password' => Hash::make($request->password)
        ]);
       
        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'User successfully created.');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name', 'id');
        return view('admin.users.edit')->withUser($user)->withRoles($roles);
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
        $request->validate([
            'name' =>  'required',
            'isActive' => 'required',
            'role_id' => 'required',
            'password' => 'required'
        ]);
        $user = User::find($id);
        $user->update($request->all());

        if ($user->save()) {
            return redirect()->route('users.show', $user->id)->with('success', 'User details successfully updated.');
        }else{
            return back();
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
}
