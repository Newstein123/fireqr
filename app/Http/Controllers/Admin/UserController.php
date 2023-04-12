<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        return view('admin.user.index');
    }
}
