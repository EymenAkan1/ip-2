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
    // Kullanıcıları listele
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users_index', compact('users'));
    }

    // Kullanıcı oluşturma sayfası
    public function create()
    {
        return view('admin.users_create');
    }

    // Yeni kullanıcıyı kaydetme
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

    // Kullanıcı düzenleme sayfası
    public function edit($id)
    {
        // Kullanıcıyı id'ye göre bul
        $user = User::findOrFail($id);
        $roles = ['admin', 'staff', 'vendor', 'worker', 'customer'];

        // Kullanıcıyı edit sayfasına gönder
        return view('admin.users_edit', compact('user', 'roles'));
    }

    // Kullanıcıyı güncelleme
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required|in:admin,staff,vendor,worker,customer',
        ]);

        // Kullanıcıyı güncelle
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // Başarılı güncelleme mesajı
        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    // Kullanıcı silme işlemi
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users_index')->with('success', 'Kullanıcı başarıyla silindi.');
    }

    // Kullanıcı profili gösterme
    public function show(User $user)
    {
        return view('admin.users_show', compact('user'));
    }

    // Kullanıcı profilini güncelleme
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
