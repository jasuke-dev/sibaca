<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        return view('admin.pages.lists.index',[
            'title' => 'User',
            'page' => 'users'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        return view('admin.pages.lists.create',[
            'title' => 'Users',
            'page' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            'role' => 'required|in:super,admin,user',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin/users')->with('success',"New User has been aded!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.lists.edit',[
            'user' => $user,
            'page' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'max:255',
            'role' => 'required|in:super,admin,user',
        ]);
        $validatedData['updated_at'] = Carbon::now();
        if($request['password']){
            $validatedData['password'] = Hash::make($validatedData['password']);
        }else{
            $validatedData['password'] = $user->password;
        }
        try {
            User::where('id' , $user->id)
            ->update($validatedData);
            return redirect('/admin/users')->with('success','User Succesfuly updated');
        } catch (\Throwable $th) {
            return redirect('/admin/users')->with('error',"Failed to edit user!");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
