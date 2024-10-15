<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Wavey\Sweetalert\Sweetalert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles =Role::all();

        return view('admin.users.app-users-list', ['users'=>$users,'roles'=>$roles]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user )
    {
        $roles =Role::all();
        return view('admin.users.app-user-profile', ['user'=>$user, 'roles'=>$roles]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            'password' => [ 'string', 'min:8', 'confirmed'],
            'photo'=> ['file']

        ]);

        if(request('photo')){
            $inputs['photo'] = request('photo')->store('images');
        }

        $user->update($inputs);

        return back();
    }
    
    public function attach(User $user, Role $roles){
        $user->roles()->attach(request('role'));


        session()->flash('success', 'User now has a role assigned ');
        return back();
    }
    public function detach(User $user){
        $user->roles()->detach(request('role'));

        // Sweetalert::success('role','User now has a role assigned');
        session()->flash('error', 'User now has\'t a role');
        // session()->flash('success', 'User now has a role assigned to a '. $roles->name);
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        // session()->flash('user-deleted', 'User has been deleted');

        return back()->with('user-deleted', 'تم حذف المستخدم');
    }
}
