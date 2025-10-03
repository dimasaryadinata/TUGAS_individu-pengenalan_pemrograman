<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk - Pasar Akun Digital</title>
    <link rel="stylesheet" href="{{asset('css/style_login.css')}}" />
  </head>
  <body>
    <div class="login-container">
      <h1>🔑 Selamat Datang Kembali</h1>
      <p>Masuk ke Akun Anda untuk Mulai Jual Beli</p>

      <form action="/login" method="POST">
        @csrf
        <div class="input-group">
          <label for="username">Nama Pengguna atau Email</label>
          <input
            type="text"
            id="username"
            name="username_email"
            required
            placeholder="Masukkan nama pengguna atau email Anda"
          />
        </div>

        <div class="input-group">
          <label for="password">Kata Sandi</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="Masukkan kata sandi Anda"
          />
        </div>

        <button type="submit" class="login-button">Masuk ke Platform</button>
      </form>

      <div class="footer-links"> |
        <a href="/register">Belum Punya Akun? Daftar Sekarang</a>
      </div>
    </div>
  </body>
</html>
