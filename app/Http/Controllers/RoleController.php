<?php

namespace App\Http\Controllers;

use App\Imports\permissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::get();
        return view('page.role.index', compact('role'));
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
            'name' => 'required',
        ]);
        Role::create(
            [
                'name' => $request->name,
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
        $role = Role::find($id);

        return view('page.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route('role.index')->with('message', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
    public function permission_to_role()

    {
        $roles = Role::all();
        $permission = Permission::get();
        $permission_group = User::getpermissionGroup();

        return view('page.role.permission_to_role', compact('roles', 'permission', 'permission_group'));
    }

    public function permission_store(Request $request)
    {
        $data = array();
        $permissions = $request->permission;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        return redirect()->route('all_role_permission')->with('message', 'Permission added successfully');
    }
    public function all_role_permission()
    {
        $role = Role::all();
        return view('page.role.permission_to_all', compact('role'));
    }
    public function role_permission_edit($id)
    {
        $roles = role::findOrFail($id);
        $permission = Permission::get();
        $permission_group = User::getpermissionGroup();

        return view('page.role.edit_permission', compact('roles', 'permission', 'permission_group'));
    }
    public function role_permission_update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect()->route('all_role_permission')->with('message', 'Permission added successfully');
    }
    public function role_permission_delete($id)
    {
        // dd($id);
        $role=Role::find($id);
        if(!is_null($role))
        {
            $role->delete();
        }
        return redirect()->route('all_role_permission')->with('status', 'Permission delete successfully');

    }
}
