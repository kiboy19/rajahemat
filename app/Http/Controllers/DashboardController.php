<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil informasi admin yang sedang login
        $admin = Auth::user();

        // Hitung total user dengan role 'user'
        $totalUsers = User::where('role', 'user')->count();

        // Ambil daftar user dengan role 'user'
        $users = User::where('role', 'user')->get();

        return view('admin.dashboard', compact('admin', 'totalUsers', 'users'));
    }
    public function servicesindex()
    {
        return view('admin/services');
    }
}
