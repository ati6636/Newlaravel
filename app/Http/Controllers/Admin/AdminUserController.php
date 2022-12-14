<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        $datalist = User::all();
        return view('admin.user', compact('datalist'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user, $id)
    {
        $data = User::find($id);
        return view('admin.user_edit', compact('data'));
    }

    public function update(Request $request, User $user, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->file('image') != null)
        {
            $data->profile_photo_path = Storage::putFile('profile-photo', $request->file('image'));
        }
        $data->save();
        return redirect()->route('admin_users')->with('success', 'Updated');
    }

    public function user_roles(Request $request, User $user, $id)
    {
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_roles', compact('data', 'datalist'));
    }

    public function user_role_store(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $roleid = $request->roleid;
        $user->roles()->attach($roleid);
        return redirect()->back()->with('success', 'Add User Role');

    }

    public function user_role_delete(Request $request, User $user, $userid, $roleid)
    {
        $user = User::find($userid);
        $user->roles()->detach($roleid);
        return redirect()->back()->with('success', 'Delete User Role');
    }

    public function destroy(User $user)
    {
        //
    }
}
