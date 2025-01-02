<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Couchbase\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users_index', compact('users'));
    }

    public function create()
    {
        return view('admin.users_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['admin', 'staff', 'vendor', 'worker', 'customer'];

        return view('admin.users_edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
            ],
            'role' => 'required|in:admin,staff,vendor,worker,customer',
        ]);

        User::where('role', $user->role)->update([
            'role' => $request->role ?? $user->role,
        ]);

        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı başarıyla silindi.');
    }


    public function show(User $user)
    {
        return view('admin.users_show', compact('user'));
    }

   public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı profili başarıyla güncellendi.');
    }

}
