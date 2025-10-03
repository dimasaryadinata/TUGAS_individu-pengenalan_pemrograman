// js/script.js (Logika Modal dan Navigasi untuk index.blade.php)

// =======================================
// VARIABEL DAN DOM ELEMENT
// =======================================
// Pastikan elemen ini ada di HTML Anda
const modal = document.getElementById("product-modal");
const closeBtn = document.querySelector(".close-btn");
const modalBuyBtn = document.getElementById("modal-buy-btn");
const navbarNav = document.querySelector(".navbar-nav");
const hamburger = document.querySelector("#hamburger-menu");

// =======================================
// FUNGSI MODAL POP-UP
// =======================================

// Fungsi ini akan dipanggil setelah DOM fully loaded
function initModalListeners() {
    // Mencari SEMUA tombol "Detail & Beli" (yang dibuat oleh Blade)
    document.querySelectorAll(".open-modal-btn").forEach((button) => {
        // Memasang event listener untuk setiap tombol
        button.addEventListener("click", function () {
            // Mengambil data dari atribut data-* tombol
            const title = this.getAttribute("data-title");
            const price = this.getAttribute("data-price");
            const desc = this.getAttribute("data-desc");
            const imgUrl = this.getAttribute("data-img");

            // Mengisi konten modal dengan data
            document.getElementById("modal-title").textContent = title;
            document.getElementById("modal-price").textContent = price;
            document.getElementById("modal-desc").textContent = desc;
            document.getElementById("modal-img").src = imgUrl;

            // Menampilkan modal
            modal.style.display = "block";
            document.body.style.overflow = "hidden"; // Mencegah scrolling di body utama

            // Logika tombol "Beli Sekarang / Pesan" di dalam modal
            modalBuyBtn.onclick = function () {
                modal.style.display = "none";
                document.body.style.overflow = "auto";

                // Opsional: Scroll ke form kontak dan isi nama produk
                setTimeout(() => {
                    const contactSection = document.getElementById("contact");
                    if (contactSection) {
                        contactSection.scrollIntoView({ behavior: "smooth" });
                    }

                    const inputPesanan = document.querySelector(
                        'input[placeholder="Akun yang Ingin Dijual / Pesanan Anda"]'
                    );
                    if (inputPesanan) {
                        inputPesanan.value = `Pesan: ${title}`;
                        inputPesanan.focus();
                    }
                }, 10);
            };
        });
    });
}

// Handler penutup modal (tombol 'x')
if (closeBtn) {
    closeBtn.onclick = function () {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    };
}

// Handler penutup modal (klik di luar area modal)
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    }
};

// =======================================
// FUNGSI NAVBAR RESPONSIVE
// =======================================
if (hamburger) {
    hamburger.onclick = (e) => {
        navbarNav.classList.toggle("active");
        e.preventDefault();
    };
}

document.addEventListener("click", function (e) {
    if (
        hamburger &&
        !hamburger.contains(e.target) &&
        !navbarNav.contains(e.target)
    ) {
        navbarNav.classList.remove("active");
    }
});

// =======================================
// INISIALISASI (saat DOM siap)
// =======================================
document.addEventListener("DOMContentLoaded", () => {
    // 1. Memuat ikon Feather Icons
    if (typeof feather !== "undefined" && feather.replace) {
        feather.replace();
    }

    // 2. Memasang listener modal setelah semua produk dicetak oleh Blade
    initModalListeners();
});
