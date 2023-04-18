<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function show($id)
    {   
        $user = User::findOrFail($id);
        return view('admin.account.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {   
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'confirm_password' => 'same:new_password'
        ], [
            'name.required' => 'အမည်လိုအပ်ပါသည်',
            'email.required' => 'Email လိုအပ်ပါသည်'
        ]);

        $name = $request->name;
        $email = $request->email;

        $user->update([
            'name' => $name,
            'email' => $email,
        ]);

        $current_password = $request->current_password;
        $confirm_password = $request->confirm_password;
        $old_password = auth()->user()->password;
        if(Hash::check($current_password, $old_password)) {
            $user->update([
                'password' => Hash::make($confirm_password),
            ]);
        } else {
            throw ValidationException::withMessages([
                'current_password' => 'The password you entered does not match your current password.',
            ]);
        }

        return redirect()->route('accountShow', auth()->id());
    }
}
