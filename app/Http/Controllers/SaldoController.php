<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    /**
     * Menampilkan dashboard pengguna dengan saldo.
     */
    public function showSaldo()
    {
        $user = Auth::user();
        return view('user.user', compact('user'));
    }

    /**
     * Menampilkan form deposit untuk pengguna.
     */
    public function depositForm()
    {
        return view('user.deposit', ['user' => Auth::user()]);
    }

    /**
     * Menangani proses deposit melalui payment gateway.
     */
    public function deposit(Request $request)
    {
        // Validasi input
        $request->validate([
            'amount' => 'required|integer|min:1',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $paymentMethod = $request->payment_method;


        // Simulasi pembayaran berhasil
        $paymentSuccess = true;

        if ($paymentSuccess) {
            $user->saldo += $amount;
            $user->save();

            return redirect()->route('user.showSaldo')->with('success', 'Deposit berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Deposit gagal, silakan coba lagi.');
        }
    }

    /**
     * Menampilkan form tambah saldo untuk admin.
     */
    public function tambahSaldoForm()
    {
        $admin = Auth::user();
        $users = User::whereIn('role', ['admin', 'user'])->get();
        return view('admin.tambahsaldo', compact('admin', 'users'));
    }

    /**
     * Menangani penambahan saldo secara manual oleh admin.
     */
    public function tambahSaldo(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer|min:1',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->saldo += $request->amount;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Saldo berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit saldo untuk admin.
     */
    public function editSaldoForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Menangani update saldo oleh admin.
     */
    public function updateSaldo(Request $request, $id)
    {
        $request->validate([
            'saldo' => 'required|integer|min:0',
        ]);

        $user = User::findOrFail($id);
        $user->saldo = $request->saldo;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Saldo berhasil diperbarui!');
    }
}
