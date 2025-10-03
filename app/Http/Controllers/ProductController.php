<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk untuk halaman utama (index.html/produk).
     */
    public function index()
    {
        $products = Product::all();
        // Mengirim data ke View utama Anda (misalnya resources/views/index.blade.php)
        return view('index', compact('products'));
    }

    /**
     * Menampilkan daftar produk untuk halaman Admin/Dashboard.
     */
    public function adminIndex()
    {
        $products = Product::all();
        // Mengirim data ke View admin Anda (misalnya resources/views/admin.blade.php)
        return view('dashboard', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     * Kita bisa gabungkan form ini di adminIndex, jadi method ini opsional.
     */
    // public function create()
    // {
    //     return view('admin.create');
    // }

    /**
     * Menyimpan produk baru yang dibuat dari form admin.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'price' => 'required|string|max:100',
            'image_url' => 'required|url|max:500',
            'detail_desc' => 'required|string',
        ]);

        // 2. Simpan ke Database
        Product::create($validatedData);

        // 3. Redirect kembali ke halaman admin dengan pesan sukses
        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan!');
    }

     public function destroy(Product $product)
    {
        // $product sudah otomatis di-resolve (Route Model Binding)
        // berdasarkan ID yang dilewatkan di URL.

        $productTitle = $product->title;

        // Proses penghapusan
        $product->delete();

        // Redirect kembali ke halaman admin produk dengan pesan sukses
        return redirect()->route('products')->with('success', "Produk '{$productTitle}' berhasil dihapus.");
    }
}