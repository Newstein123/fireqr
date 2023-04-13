<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;

class UserController extends ResponseController
{
    public function index()
    {   
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'user');
        })->get();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {   
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |unique:users',
            'password' => 'min:8 |max:20|same:confirm_password',
            'confirm_password' => 'min:8|max:20'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('userIndex')->with('message', 'User created successfully');
    }

    public function edit($id)
    {   
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {  
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->assignRole($request->role);
        return redirect()->route('userIndex');
    }

    public function change_state(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user) {
            if($user->status == 0) {
                $user->status = 1;
                $user->save();
                return $this->successMessage($user, 'User Ban Successfully');
            } else {
                $user->status = 0;
                $user->save();
                return $this->successMessage($user, 'User Unbanned Successfully');
            }
        } else {
            return $this->errorMessage();
        }
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user) {
            $user->delete();
            return $this->successMessage('', 'User Deleted Successfully');
        } else {
            return $this->errorMessage();
        }
    }
}
