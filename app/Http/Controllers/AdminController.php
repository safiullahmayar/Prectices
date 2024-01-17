<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = auth::user()->id;
        $userData = user::find($id);
        $userData->name = $request->name;
        $userData->username = $request->username;
        $userData->email = $request->email;
        $userData->phone = $request->phone;
        $userData->address = $request->address;
        if($request->Hasfile('image')){
            $image=$request->file('image');
            $imageName=date('YmDHi').$image->getclientOriginalName();
            $image->move(public_path('upload/admin_image'),$imageName);
            $userData->image=$imageName;
        }
        $userData->save();
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function login(Request $request)

    {
        return view('admin.admin_login.admin_login');
    }
    public function admin_profile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.admin_profile', compact('userData'));
    }
}
