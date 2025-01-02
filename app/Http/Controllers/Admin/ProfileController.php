<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Tampilkan form edit profile.
     */
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.profile.edit', compact('admin'));
    }

    /**
     * Update profile admin.
     */
    public function update(Request $request)
    {
        $admin = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($admin->id),
            ],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($admin->avatar && File::exists(public_path($admin->avatar))) {
                File::delete(public_path($admin->avatar));
            }

            // Simpan avatar baru langsung di public/storage/avatars
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Pindahkan file ke public/storage/avatars
            $file->move(public_path('storage/avatars'), $filename);

            // Update path avatar di database
            $admin->avatar = 'avatars/' . $filename;
        }

        // Simpan perubahan ke database
        $admin->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
