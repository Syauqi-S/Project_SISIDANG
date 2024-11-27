<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;
use Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = roles::all();
        return view("admin.roles.index")->with('roles', $roles);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("admin.roles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorerolesRequest $request)
    {

        $role = new roles();
        $role->role = $request->role;
        $role->save();

        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = roles::find($id);
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$role) return redirect('/roles')->with('errors', "Role tidak ditemukan");
        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterolesRequest $request, $id)
    {

        $role = roles::find($id);
        $role->role = $request->role;
        $role->update();

        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = roles::find($id);

    //    if (!$user) return response()->json(["statusCode"=>404, "msg"=>"User tidak ditemukan"]); 
    // validasi jika user id tidak di temukan ketika ingin delete
    if (!$role) return redirect('/roles')->with('errors', "Role tidak ditemukan");
        $role->delete();

        return redirect('/roles');   
    }
}