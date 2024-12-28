<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SmmNusantaraFetcher;

class ServiceController extends Controller
{
    protected $apiUrl;
    protected $apiId;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.smmnusantara.url');
        $this->apiId = config('services.smmnusantara.api_id');
        $this->apiKey = config('services.smmnusantara.api_key');

        // Validasi bahwa API URL adalah string yang valid
        if (!is_string($this->apiUrl) || empty($this->apiUrl)) {
            throw new \Exception('Konfigurasi Smm Nusantara URL tidak valid.');
        }

        // Validasi bahwa API ID dan API Key sudah diset
        if (empty($this->apiId) || empty($this->apiKey)) {
            throw new \Exception('API ID atau API Key untuk Smm Nusantara belum diset.');
        }
    }

    /**
     * Menampilkan daftar layanan untuk admin.
     */
    public function adminIndex(Request $request)
    {
        $admin = Auth::user(); // Dapatkan data admin yang sedang login
        $categories = Category::all();

        $query = Service::with('category');

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Pencarian berdasarkan nama layanan
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sortir data
        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('id', 'asc'); // Default sorting
        }

        // Pagination
        $services = $query->simplePaginate(10)->withQueryString();

        // Return ke view
        return view('admin.services', compact('admin', 'services', 'categories'));
    }

    /**
     * Mengambil data layanan dari API menggunakan Guzzle.
     */
    public function fetchServices()
    {
        $fetcher = new SmmNusantaraFetcher();
        $result = $fetcher->fetchAndStoreServices();

        if ($result['status']) {
            return redirect()
                ->route('admin.services.index')
                ->with('success', $result['message']);
        } else {
            return back()->with('error', $result['message']);
        }
    }



    /**
     * Menampilkan form untuk membuat layanan baru.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Menyimpan layanan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:services,id', // Validasi 'id'
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id', // Validasi 'category_id'
            'price' => 'required|numeric',
            'min' => 'required|integer',
            'max' => 'required|integer',
            'refill' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        Service::create($request->all());

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit layanan.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Memperbarui data layanan di database.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id', // Validasi 'category_id'
            'price' => 'required|numeric',
            'min' => 'required|integer',
            'max' => 'required|integer',
            'refill' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $service->update($request->all());

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan dari database.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }

    
        /**
     * Menampilkan daftar layanan untuk user FUNGSI KHUSUS DASHBOARD USER DIMULAI DARI SINI.
     */
    public function userIndex(Request $request)
    {
        $user = Auth::user(); // Dapatkan data user yang sedang login
        $categories = Category::all();
    
        $query = Service::with('category');
    
        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        // Pencarian berdasarkan nama atau id layanan
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('id', 'like', '%' . $request->search . '%');
            });
        }
    
        // Sortir data
        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('id', 'asc'); // Default sorting
        }
    
        // Pagination
        $services = $query->simplePaginate(10)->withQueryString();
    
        // Return ke view
        return view('user.services', compact('user', 'services', 'categories'));
    }
    

    // Fungsi Untuk Menampilkan Nama User ketika login ke dashboard user halaman user
    public function userNav(Request $request) {
        $user = Auth::user(); // Dapatkan data user yang sedang login
        // Return ke view
        return view('user.user', compact('user'));
    }

    // Fungsi Untuk Menampilkan Nama User ketika login ke dashboard user halaman Deposit
    public function userNavDeposit(Request $request) {
        $user = Auth::user(); // Dapatkan data user yang sedang login
        // Return ke view
        return view('user.deposit', compact('user'));
    }

    // Fungsi Untuk Menampilkan Nama User ketika login ke dashboard user halaman Deposit
    public function userNavHistory(Request $request) {
        $user = Auth::user(); // Dapatkan data user yang sedang login
        // Return ke view
        return view('user.history', compact('user'));
    }
}
