<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function create()
    {
        return view('admin.permissions.create');
    }

    // Store a newly created role in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',

        ]);

        Permission::create([
            'name'=> request('name'),
            'slug' => Str::lower(request('name')),
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Role created successfully.');
    }

    // Show the form for editing the specified role
    public function edit(Permission $role, Permission $permissions)
    {
        return view('admin.roles.edit', ['role'=> $role,'permissions'=> Permission::all()]);
    }

    // Update the specified role in the database
    public function update(Request $request, Permission $role)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $role->id,
        ]);

        $role->update([
            'name'=> request('name'),
            'slug' => Str::lower(request('name')),
        ]);


        return redirect()->route('admin.permission.index')->with('success', 'Role updated successfully.');
    }

    // Remove the specified role from the database
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
