<?php

namespace App\Http\Controllers;

use App\Exports\PermissionExport;
use App\Imports\permissionImport;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::get();
        return view('page.permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);
        if ($validate) {
            Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);
            return redirect()->route('permission.index')->with('status', 'permission added successfully');
        } else {
            return redirect()->back()->with('status', 'permission not added');
        }
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
        $permission = permission::find($id);
        return view('page.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $permission = permission::find($id);
        $validate = $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);
        if ($validate) {
            $permission->update([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);
            return redirect()->route('permission.index')->with('status', 'permission updated successfully');
        } else {
            return redirect()->back()->with('status', 'permission not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Permission::find($id);
        $delete->delete();
        return redirect()->route('permission.index')->with('status', 'permission deleted successfully');
    }
    // download permission Data
    public function import_excel()
    {
        return view('page.permission.import_excel');
    }
    public function export_permission()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'name' => 'required|mimes:xlsx',
        ]);
        $file = $request->name;
        Excel::import(new permissionImport, $file);

        return redirect()->route('permission.index')->with('success', 'All good!');
    }
}
