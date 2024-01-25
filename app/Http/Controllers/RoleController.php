<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role=Role::get();
        return view('page.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name'=>'required',
    ]);
    Role::create(
        [
            'name'=>$request->name,
        ]
    );
    return redirect()->route('role.index')->with('message', 'Role created successfully');
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
    public function edit(string $id)
    {
        $role=Role::find($id);

    return view('page.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role=Role::find($id);
        $request->validate([
            'name'=>'required',
        ]);
        $role->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('role.index')->with('message', 'updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
    public function permission_to_role()

{
    $roles=Role::all();
    $permission=Permission::get();
    
    return view('page.role.permission_to_role',compact('roles','permission'));
}}
