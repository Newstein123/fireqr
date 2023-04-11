<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function get_all_roles()
    {   
        $roles = Role::all();
        return view('admin.permission.index', compact('roles'));
    }
}
