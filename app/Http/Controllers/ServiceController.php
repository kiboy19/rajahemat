<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * Menampilkan daftar layanan.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Service::with('category');

        // Filter kategori jika dipilih
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Pencarian berdasarkan nama layanan
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Sortir harga
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('id', 'asc'); // Default sorting
        }

        // Pagination
        $services = $query->simplePaginate(10)->withQueryString();

        // Jika request AJAX (live search), kita kembalikan partial view saja
        if ($request->ajax()) {
            return response()->json([
                'html' => view('services.partials.services_table', compact('services'))->render(),
            ]);
        }

        return view('services.index', compact('services', 'categories'));
    }

    

    /**
     * Menampilkan form untuk membuat layanan baru.
     */
    public function create()
    {
        $categories = Category::all();
        return view('services.create', compact('categories'));
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

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit layanan.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('services.edit', compact('service', 'categories'));
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

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan dari database.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function adminIndex(Request $request)
    {
        $categories = Category::all();

        $query = Service::with('category');

        // Filter kategori jika dipilih
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Pencarian berdasarkan nama layanan
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Sortir harga
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('id', 'asc'); // Default sorting
        }

        // Pagination
        $services = $query->simplePaginate(10)->withQueryString();

        // Jika request AJAX (live search), bisa kembalikan partial view
        if ($request->ajax()) {
            // Buat partial khusus admin, misalnya 'admin.partials.services_table'
            return response()->json([
                'html' => view('admin.partials.services_table', compact('services'))->render(),
            ]);
        }

        // Return ke view admin, misalnya 'admin.services'
        // Nanti kita sesuaikan agar file ini menampilkan tabel dgn Tailwind
        return view('admin.services', compact('services', 'categories'));
    }

    /**
     * Mengambil data layanan dari API menggunakan Guzzle.
     */
    public function fetchServices()
    {
        $client = new Client();

        try {
            // Log Permintaan API
            Log::info('API Request:', [
                'url' => $this->apiUrl,
                'method' => 'POST',
                'params' => [
                    'api_id' => $this->apiId,
                    'api_key' => $this->apiKey,
                ],
            ]);

            $response = $client->request('POST', $this->apiUrl, [
                'form_params' => [
                    'api_id' => $this->apiId,
                    'api_key' => $this->apiKey,
                ],
                'timeout' => 10,
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody(), true);

            // Log Respon API
            Log::info('API Response:', [
                'status_code' => $statusCode,
                'body' => $body,
            ]);

            if ($statusCode == 200 && isset($body['status']) && $body['status'] === true) {
                foreach ($body['services'] as $serviceData) {
                    // Cek apakah kategori sudah ada, jika belum, buat kategori baru
                    $category = Category::firstOrCreate(
                        ['name' => $serviceData['category']],
                        ['name' => $serviceData['category']]
                    );

                    // Simpan atau update data ke database
                    Service::updateOrCreate(
                        ['id' => $serviceData['id']], // Asumsi 'id' unik dari API
                        [
                            'name' => $serviceData['name'],
                            'type' => $serviceData['type'],
                            'category_id' => $category->id, // Menghubungkan ke kategori
                            'price' => $serviceData['price'],
                            'min' => $serviceData['min'],
                            'max' => $serviceData['max'],
                            'refill' => $serviceData['refill'],
                            'description' => $serviceData['description'],
                        ]
                    );
                }

                return redirect()->route('admin/services')->with('success', 'Data layanan berhasil diambil dan disimpan.');
            } else {
                // Tangani respon gagal dari API
                $errorMsg = isset($body['msg']) ? $body['msg'] : 'Gagal mengambil data dari API.';
                return back()->with('error', $errorMsg);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Tangani error client seperti 4xx
            $response = $e->getResponse();
            $body = json_decode($response->getBody(), true);
            $errorMsg = isset($body['msg']) ? $body['msg'] : 'Terjadi kesalahan saat mengakses API.';

            // Log Error Client
            Log::error('Client Error:', [
                'error_message' => $errorMsg,
            ]);

            return back()->with('error', 'Client Error: ' . $errorMsg);
        } catch (\Exception $e) {
            // Tangani exception lainnya seperti timeout, koneksi gagal, dll.

            // Log Exception
            Log::error('Exception:', [
                'error_message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}