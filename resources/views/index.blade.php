<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dimas Akun | Jual Beli Akun Game & Premium Terpercaya</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <script src="https://unpkg.com/feather-icons"></script>
    </head>
  <body>
    <nav class="navbar">
      <a href="#home" class="navbar-logo"> Dimas<span>Akun</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#products">Produk</a>
        <a href="#contact">Kontak</a>
        <a href="/products">Login Admin</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <section class="hero" id="home">
      <main class="content">
        <h1>Beli & Jual Akun <span>Terpercaya</span></h1>
        <p>
          Jaminan keamanan dan transaksi cepat untuk semua kebutuhan akun game,
          premium, dan digital Anda.
        </p>
        <a href="#products" class="btn">Lihat Semua Akun</a>
      </main>
    </section>

    <section class="products" id="products">
      <h2><span>Produk</span> Kami</h2>

      <div class="product-cards">
        @foreach($products as $data)
        <div class="product-card">
        <img src="{{$data->image_url}}" alt="{{$data->title}}" />
            <h3>{{$data->title}}</h3>
            <p>{{$data->short_desc}}</p>
            <div class="price">{{$data->price}}</div>
            <a class="btn open-modal-btn" style="background-color: #333"
                data-title="{{$data->title}}"
                data-price="{{$data->price}}"
                data-desc="{{$data->detail_desc}}"
                data-img="{{$data->image_url}}"
            >Detail & Beli</a>
        </div>
        @endforeach
    </section>

    <section class="contact" id="contact">
      <h2 style="color: var(--primary)">
        Form <span>Jual</span> Akun & Kontak
      </h2>
      <p style="text-align: center; margin-bottom: 2rem">
        Silakan gunakan formulir ini untuk **menjual akun Anda** kepada kami.
        Untuk **pembelian**, **terima kasih** telah memilih DimasAkun! Kami akan
        menghubungi Anda setelah Anda mengirimkan detail pesanan Anda di bawah.
      </p>

      <div class="row">
        <iframe
          class="map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5705353007463!2d106.82024507421901!3d-6.17511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f53e6e1f0e21%3A0x6b8d9c15852b75f8!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>

       <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <div class="input-group">
      <i data-feather="user"></i>
      <input type="text" name="customer_name" placeholder="Nama Anda" required />
    </div>
    <div class="input-group">
      <i data-feather="mail"></i>
      <input
        type="email"
        name="email"
        placeholder="Email Aktif (untuk pembelian/penjualan akun)"
        required
      />
    </div>
    <div class="input-group">
      <i data-feather="phone"></i>
      <input type="text" name="whatsapp" placeholder="WhatsApp (untuk dihubungi)" required />
    </div>
    <div class="input-group">
      <i data-feather="archive"></i>
      <input
        type="text"
        name="order_details"
        placeholder="Isi dengan ID Produk"
        required
      />
    </div>
    <button type="submit" class="btn">Kirim Sekarang</button>
</form>
      </div>
    </section>

    <footer>
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#products">Produk</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="#">DimasAkun</a>. | © 2025</p>
      </div>
    </footer>

    <div id="product-modal" class="modal">
      <div class="modal-content">
        <span class="close-btn">×</span>
        <img id="modal-img" src="" alt="Product Image" />
        <h3 id="modal-title">Nama Produk</h3>
        <div class="price" id="modal-price">Harga</div>
        <p id="modal-desc">Deskripsi lengkap produk akan muncul di sini.</p>

        <a href="#contact" id="modal-buy-btn" class="modal-btn-contact"
          >Beli Sekarang / Pesan</a
        >
      </div>
    </div>
    
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>