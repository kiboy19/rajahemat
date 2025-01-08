<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth;
use PDF;

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
     * Export users to PDF
     */
    public function exportPdf()
    {
        // Ambil semua pengguna dengan role 'user'
        $users = User::where('role', 'user')->get();

        // Buat view untuk PDF
        $pdf = FacadePdf::loadView('admin.users.pdf', compact('users'));

        // Nama file PDF
        $fileName = 'list_users_' . date('Y_m_d_H_i_s') . '.pdf';

        // Download PDF
        return $pdf->download($fileName);
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