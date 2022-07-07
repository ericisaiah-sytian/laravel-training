<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.users.users');
    }

    public function addUser()
    {
        return view('admin.users.add-user');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        auth()->login(User::create($attributes));

        return redirect('/admin/users')->with('success', 'User has been created.');
    }

    public function edit($id)
    {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('admin.users.edit-user',['users'=>$users]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255', Rule::unique('users','username')->ignore($user)],
            'email' => ['required','email','max:255',Rule::unique('users','email')->ignore($user)],
            'password' => 'required|min:7|max:255',
        ]);

        $user->update($attributes);

        return redirect('/admin/users')->with('success', 'User has been updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/users')->with('success', 'User has been deleted.');
    }
}
