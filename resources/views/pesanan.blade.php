<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin - Daftar Pesanan</title>
    <link rel="stylesheet" href="{{asset('css/dashstyle.css')}}" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        /* CSS yang sama dengan di admin produk, atau tambahkan di dashstyle.css */
        .order-item {
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .order-item strong { color: #2980b9; }
        .order-item p { margin: 5px 0; }
        .status-pending { color: #e67e22; font-weight: bold; }
        .status-processed { color: #2980b9; font-weight: bold; }
        .status-completed { color: #27ae60; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard Admin Pesanan Masuk</h1>
        
        <a href="/products" class="btn" style="background-color: #34495e; margin-bottom: 20px;">
            <i data-feather="arrow-left" style="width: 16px; height: 16px;"></i> Kembali ke Produk
        </a>

        @if ($orders->isEmpty())
            <p>Belum ada pesanan yang masuk.</p>
        @else
            @foreach ($orders as $order)
                <div class="order-item">
                    <strong>Pesanan #{{ $order->id }} - Status: <span class="status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></strong>
                    <p>Dari: {{ $order->customer_name }} ({{ $order->email }})</p>
                    <p>WhatsApp: <a href="https://wa.me/{{ $order->whatsapp }}" target="_blank">{{ $order->whatsapp }}</a></p>
                    <p><strong>Detail Pesanan:</strong> {{ $order->order_details }}</p>
                    <small>Diterima pada: {{ $order->created_at->format('d M Y, H:i') }}</small>
                    
                    {{-- Di sini Anda bisa menambahkan form/tombol untuk mengubah status pesanan --}}
                </div>
            @endforeach
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</body>
</html>