<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Akun Baru - DimasAkun</title>
    <link rel="stylesheet" href="{{asset('css/style_login.css')}}" /> 
</head>
<body>
    <div class="register-container">
        <h1>✨ Buat Akun Baru</h1>
        <p>Gabung di DimasAkun dan mulai transaksi digital Anda!</p>
        <form action="/register" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Nama Pengguna</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    required
                    placeholder="Contoh: DimasGamingPro"
                />
            </div>
            
            <div class="input-group">
                <label for="email">Alamat Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    placeholder="Masukkan email aktif Anda"
                />
            </div>

            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Minimal 8 karakter"
                />
            </div>
            
            <div class="input-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    placeholder="Ulangi kata sandi"
                />
            </div>

            <button type="submit" class="register-button">Daftar Sekarang</button>
        </form>

        <div class="footer-links">
            Sudah punya akun? 
            <a href="login">Masuk di sini</a>
        </div>
    </div>
</body>
</html>