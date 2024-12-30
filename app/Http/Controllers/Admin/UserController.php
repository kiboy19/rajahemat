<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan form edit pengguna.
     */
    public function edit(User $user)
    {
        $admin = Auth::user();
        return view('admin.users.edit', compact('admin', 'user'));
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, User $user)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'saldo' => 'required|integer|min:0', 
        ]);

        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'saldo' => $request->saldo, 
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy(User $user)
    {
    
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.dashboard')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User berhasil dihapus.');
    }
}
