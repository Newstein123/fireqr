<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends ResponseController
{
    public function get_all_roles()
    {   
        $roles = Role::where('name', '!=', 'user')->get();
        return view('admin.permission.index', compact('roles'));
    }

    public function edit($id)
    {      
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.permission.edit', compact('permissions', 'role'));
    }

    public function grant_permission(Request $request)
    {
        $role = Role::findById($request->id);
        if($role) {
            if($request->status == 'true') {
                $role->givePermissionTo($request->name);
                return $this->successMessage('', 'Permission Granted Successfully');
            } else {
                $role->revokePermissionTo($request->name);
                return $this->successMessage('', 'Permission Revoked Successfully');
            }
        } else {
            return $this->errorMessage();
        }
    }
}
