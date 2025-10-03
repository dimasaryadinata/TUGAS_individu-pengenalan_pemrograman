<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Tambah Produk</title>
    <link rel="stylesheet" href="{{asset('css/dashstyle.css')}}" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        /* CSS Sederhana untuk Tampilan Daftar Produk */
        .product-item {
            padding: 10px;
            border: 1px solid #eee;
            margin-bottom: 10px;
            border-radius: 4px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-info strong {
            display: block;
            font-size: 1.1em;
            color: #555;
        }
        .btn-action {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
            color: white;
            font-size: 0.9em;
        }
        .btn-delete { background-color: #c0392b; }
        .btn-edit { background-color: #3498db; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; font-weight: bold; }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Dashboard Admin Produk</h1>
      
      {{-- Menampilkan pesan sukses dari Controller --}}
      @if (session('success'))
          <div class="message success">
              {{ session('success') }}
          </div>
      @endif

      {{-- Menampilkan pesan error validasi --}}
      @if ($errors->any())
          <div class="message error">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

        {{-- TAMBAHAN LINK KE DASHBOARD KEMBALI --}}
    <div style="margin-bottom: 25px; text-align: center;">
        <a href="/" class="btn" style="background-color: grey;">
            <- KEMBALI
        </a>
    </div>
    

      {{-- TAMBAHAN LINK KE DASHBOARD PESANAN --}}
    <div style="margin-bottom: 25px; text-align: center;">
        <a href="/orders" class="btn" style="background-color: #2ecc71;">
            <i data-feather="inbox" style="width: 16px; height: 16px;"></i> Lihat Pesanan Masuk
        </a>
    </div>
    
    {{-- Menampilkan pesan sukses dari Controller --}}

      <h2>Formulir Tambah Produk Baru</h2>
      <form id="product-form" method="POST" action="/products">
        @csrf

        <div class="input-group">
          <label for="image_url">Alamat URL Gambar (IMG)</label>
          <input type="url" name="image_url" id="image_url" required value="{{ old('image_url') }}">
        </div>

        <div class="input-group">
          <label for="title">Judul Produk</label>
          <input type="text" name="title" id="title" required value="{{ old('title') }}">
        </div>

        <div class="input-group">
          <label for="short_desc">ID Produk</label>
          <input type="text" name="short_desc" id="short_desc" required value="{{ old('short_desc') }}">
        </div>

        <div class="input-group">
          <label for="price">Harga (Price)</label>
          <input type="text" name="price" id="price" required value="{{ old('price') }}">
        </div>

        <div class="input-group">
          <label for="detail_desc">Deskripsi Detail</label>
          <textarea name="detail_desc" id="detail_desc" rows="4" required>{{ old('detail_desc') }}</textarea>
        </div>

        <button type="submit" class="btn">
            <i data-feather="plus-circle" style="width: 16px; height: 16px;"></i> Tambahkan Produk
        </button>
      </form>
      
      <div class="product-list">
        <h2>Daftar Produk yang Sudah Ada</h2>
        <div id="product-list-container">
            @if ($products->isEmpty())
                <p>Belum ada produk yang ditambahkan.</p>
            @else
                @foreach ($products as $product)
                    <div class="product-item">
                        <div class="product-info">
                            <strong>ID {{ $product->id }}: {{ $product->title }}</strong>
                            <p>Harga: {{ $product->price }} | Deskripsi: {{ $product->short_desc }}</p>
                        </div>
                        <div class="product-actions">
                            {{-- Form Hapus untuk SATU Produk --}}
                            <form action="{{route('destroy', $product->id)}}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->title }}?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i data-feather="trash" style="width: 14px; height: 14px;"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Jika Anda ingin tombol hapus semua data, Anda harus membuat route dan controller terpisah (misalnya ProductController@clearAll) --}}
        {{-- Tombol ini sekarang tidak berfungsi karena tidak berada dalam form yang valid --}}
        <button class="btn" style="background-color: #7f8c8d; margin-top: 20px;" disabled>
            Hapus Semua Data (Fitur Belum Diaktifkan)
        </button>
      </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inisialisasi Feather Icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
  </body>
</html>