<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    public function getUsers()
    {
        $users = User::paginate(15);

        return view('lista', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::latest()->paginate(5);
  
        return view('lista',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        User::create($request->all());
   
        return redirect()->route('lista')
            ->with('success','User created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $video
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $video
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
  
        if(request('new_password'))
        request()->merge(['password' => Hash::make(request('new_password'))]);
        
        $user->update($request->all());
  
        return redirect()->route('lista')
            ->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('lista')
                        ->with('success','User deleted successfully');

    }

}
