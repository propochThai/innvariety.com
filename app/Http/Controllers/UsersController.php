<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
class UsersController extends Controller
{
     public function __construct()
    {
        $this->page_name_active = 'users';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')
                ->with('users',User::all())
                ->with('title','List Users')
                ->with('page_name_active',$this->page_name_active);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        //dd($roles);
        return view('admin.users.create')
                ->with('roles',$roles)
                ->with('title','Create a User')
                ->with('page_name_active',$this->page_name_active);
               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'required|image',
            'role_id' => 'required'
        ]);

    
        $avatar = $request->avatar;

        $avatar_new_name = time() . $avatar->getClientOriginalName();

        $avatar->move('uploads/avatar', $avatar_new_name);

        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'avatar' => '/uploads/avatar/'.$avatar_new_name
            ]);

        
    
        Session::flash('success','User created successfully.');
        return redirect()->route('users');
        

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
        
        $user = User::find($id);
        $roles = Role::all();
       
        return view('admin.users.edit')
               ->with('user',$user)
               ->with('roles',$roles)
               ->with('title','Edit a User')
               ->with('page_name_active',$this->page_name_active);
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

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role_id' => 'required|integer',

            
        ]);

        $user = User::find($id);

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time() . $avatar->getClientOriginalName();

            $avatar->move('uploads/avatar', $avatar_new_name);

            $user->avatar = 'uploads/avatar/'.$avatar_new_name;
            
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();
       

        Session::flash('success', 'User updated successfully.');

        return redirect()->route('users');
    
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

       $user->delete();

       Session::flash('success','The user was deleted.');
       return redirect()->back();
    }
}
