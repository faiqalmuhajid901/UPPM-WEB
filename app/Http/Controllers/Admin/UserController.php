<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Fungsi Helper untuk memeriksa apakah user login adalah Super Admin
     * Ini membuat kode lebih rapi dan tidak diulang-ulang.
     */
    private function checkSuperAdmin()
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403, 'Hanya Super Admin yang memiliki izin akses fitur ini.');
        }
    }

    public function index()
    {
        $this->checkSuperAdmin();
        
        $users = User::latest()->paginate(10); 

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->checkSuperAdmin();

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->checkSuperAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,super_admin', // Hanya boleh admin atau super admin
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    public function updateRole(Request $request, $id)
    {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);

        // Mencegah user mengubah role miliknya sendiri
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak bisa mengubah role sendiri!');
        }

        $request->validate([
            'role' => 'required|in:admin,super_admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', "Role user {$user->name} berhasil diubah.");
    }

    public function destroy($id)
    {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}