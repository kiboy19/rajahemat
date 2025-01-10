<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menyimpan pemesanan layanan oleh user.
     */
    public function store(Request $request)
    {
        // Validasi input dasar
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'link' => 'required|url',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $service = Service::findOrFail($request->service_id);
        $quantity = $request->quantity;

        // Validasi jumlah berdasarkan min dan max
        if ($quantity < $service->min) {
            return redirect()->back()->with('error', 'Jumlah yang anda pesan kurang dari minimal pemesanan.');
        }

        if ($quantity > $service->max) {
            return redirect()->back()->with('error', 'Jumlah yang anda pesan melebihi batas maksimal pemesanan.');
        }

        // Hitung total harga: (price / 1000) * quantity
        $totalPrice = ($service->price / 1000) * $quantity;

        // Cek saldo user
        if ($user->saldo < $totalPrice) {
            return redirect()->back()->with('error', 'Saldo yang anda miliki tidak cukup.');
        }

        // Transaksi database untuk memastikan konsistensi
        DB::beginTransaction();

        try {
            // Kurangi saldo user
            $user->saldo -= $totalPrice;
            $user->save();

            // Simpan pemesanan
            Order::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'link' => $request->link,
                'quantity' => $quantity,
                'price' => $service->price, // Harga per 1000 unit
                'total' => $totalPrice,
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->route('user.history')->with('success', 'Pemesanan berhasil dilakukan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pemesanan.');
        }
    }

    /**
     * Menampilkan history pemesanan untuk user.
     */
    
     public function userHistory(Request $request)
    {
        $user = Auth::user();
        $query = $user->orders()->with('service')->orderBy('created_at', 'desc');

        // Cek apakah ada parameter search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id', 'LIKE', "%{$search}%")
                  ->orWhere('link', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
                // Anda bisa menambahkan filter lain jika diperlukan
            });
        }

        $orders = $query->paginate(10);

        // Jika permintaan AJAX, kembalikan partial view
        if ($request->ajax()) {
            return response()->json([
                'html' => view('user.partials.orders-table', compact('orders'))->render()
            ]);
        }

        // Jika bukan AJAX, tampilkan view lengkap
        return view('user.history', compact('user','orders'));
    }

    /**
     * Menampilkan seluruh history pemesanan untuk admin.
     */
    public function adminHistory(Request $request)
    {
        $admin = Auth::user(); 
        $query = Order::with(['user', 'service'])->orderBy('created_at', 'desc');

        // Cek apakah ada parameter search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function($q2) use ($search) {
                      $q2->where('name', 'LIKE', "%{$search}%");
                  })
                  ->orWhere('link', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        $orders = $query->paginate(20);

        // Jika permintaan AJAX, kembalikan partial view
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.orders-table', compact('admin','orders'))->render()
            ]);
        }

        // Jika bukan AJAX, tampilkan view lengkap
        return view('admin.history', compact('admin','orders'));
    }

    /**
     * Mengubah status pemesanan menjadi "processing".
     */
    public function processOrder(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya pemesanan dengan status pending yang dapat diproses.');
        }

        $order->status = 'processing';
        $order->save();

        return redirect()->back()->with('success', 'Pemesanan telah diproses.');
    }

    /**
     * Mengubah status pemesanan menjadi "cancelled".
     */
    public function cancelOrder(Order $order)
    {
        if ($order->status === 'completed' || $order->status === 'cancelled') {
            return redirect()->back()->with('error', 'Pemesanan tidak dapat dibatalkan.');
        }

        // Kembalikan saldo user jika pemesanan dibatalkan sebelum diproses
        if ($order->status === 'pending') {
            $user = $order->user;
            $user->saldo += $order->total;
            $user->save();
        }

        $order->status = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Pemesanan telah dibatalkan.');
    }

    /**
     * Mengubah status pemesanan menjadi "completed".
     */
    public function completeOrder(Order $order)
    {
        if ($order->status !== 'processing') {
            return redirect()->back()->with('error', 'Hanya pemesanan yang sedang diproses yang dapat diselesaikan.');
        }

        $order->status = 'completed';
        $order->save();

        return redirect()->back()->with('success', 'Pemesanan telah diselesaikan.');
    }
}
