<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.index', compact('permissions'));
    }


    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        Permission::create($validated);
        return redirect()->route('adminpermission.index')->with('message', 'Permission created successfully');
    }

    public function edit(Permission $permission)
    {

        $roles = Role::all();
        return view('admin.permission.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        $permission->update($validated);
        return redirect()->route('adminpermission.index')->with('message', 'Permission Updated Successfully!!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('adminpermission.index')->with('message', 'Permission Deleted Successfully!!');
    }

    public function revokeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function giveRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }
        $permission->assignRole($request->role);
        return back()->with('Role Assign Successfully!!');
    }
}
