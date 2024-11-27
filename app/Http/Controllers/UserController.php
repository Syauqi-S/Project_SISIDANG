<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view("admin.users.index")->with('users', $users);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $roles = roles::all();
        return view("admin.users.create")->with('roles',$roles);
    }

    public function edit($id){
        $user = User::find($id);
        $roles = roles::all();
        
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$user) return redirect('/users')->with('errors', "User tidak ditemukan");
        return view('admin.users.edit')->with('user', $user)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        // objek sudah ada, jadi tidak perlu New, jika New, data tidak akan terupdate karena datanya dibuat baru
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_role = $request->role;
        $user->update();

        return redirect('/users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        // $user adalah data(objek) baru, membuat data(objek) baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_role = $request->role;
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

    //    if (!$user) return response()->json(["statusCode"=>404, "msg"=>"User tidak ditemukan"]); 
    // validasi jika user id tidak di temukan ketika ingin delete
    if (!$user) return redirect('/users')->with('errors', "User tidak ditemukan");
        $user->delete();

        return redirect('/users');  
    }
}