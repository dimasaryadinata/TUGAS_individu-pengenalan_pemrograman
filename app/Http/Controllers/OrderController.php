<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menyimpan pesanan/kontak yang masuk dari halaman utama.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:100',
            'order_details' => 'required|string',
        ]);

        Order::create([
            'customer_name' => $validatedData['customer_name'],
            'email' => $validatedData['email'],
            'whatsapp' => $validatedData['whatsapp'],
            'order_details' => $validatedData['order_details'],
        ]);

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Pesanan Anda telah kami terima! Kami akan segera menghubungi Anda melalui WhatsApp.');
    }

    /**
     * Menampilkan daftar pesanan untuk dashboard Admin.
     */
    public function adminIndex()
    {
        // Ambil semua pesanan, diurutkan dari yang terbaru (paling atas)
        $orders = Order::latest()->get(); 
        return view('pesanan', compact('orders'));
    }
}