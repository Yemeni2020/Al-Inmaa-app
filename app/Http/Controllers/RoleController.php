<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RoleController extends Controller
{
    // Display a listing of the roles
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    // Show the form for creating a new role
    public function create()
    {
        return view('admin.roles.create');
    }

    // Store a newly created role in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',

        ]);

        Role::create([
            'name'=> request('name'),
            'slug' => Str::lower(request('name')),
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    // Show the form for editing the specified role
    public function edit(Role $role, Permission $permissions)
    {
        return view('admin.roles.edit', ['role'=> $role,'permissions'=> Permission::all()]);
    }

    // Update the specified role in the database
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name'=> request('name'),
            'slug' => Str::lower(request('name')),
        ]);


        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    // Remove the specified role from the database
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }

    public function attach(Role $role){
        $role-> permissions()->attach(request('permission'));
        return back();
    }
    public function detach(Role $role){
        $role-> permissions()->detach(request('permission'));
        return back();
    }

}
