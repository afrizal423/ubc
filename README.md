# 🏸 UBS Gold Badminton Community (UBC)

Halo! Selamat datang di repo project **UBS Gold Badminton Community**. Ini adalah platform manajemen komunitas bulutangkis yang dibikin biar makin pro, rapi, dan transparan. Project ini punya dua sisi: website publik yang kece buat member, dan dashboard admin buat kita ngurusin segala printilannya.

---

## ✨ Fitur-Fitur Kece

### 🌐 Website Publik (Frontend)
- **Hero Section:** Tampilan utama yang bikin semangat main badminton.
- **Jadwal Rutin:** Cek sesi latihan mingguan lewat kartu-kartu yang bisa di-scroll.
- **Leaderboard:** Lihat siapa yang paling jago dan rajin di komunitas.
- **Event & Galeri:** Dokumentasi kegiatan biar makin akrab.
- **Transparansi Keuangan:** Semua pemasukan dan pengeluaran bisa dicek secara real-time. Jujur itu asik!
- **Form Pendaftaran:** Buat yang mau gabung, tinggal isi form aja.

### 🛠️ Admin Panel (Backend)
- **Dashboard:** Statistik member, grafik keuangan (Chart.js), dan event mendatang.
- **Manajemen Full (CRUD):** 
    - Atur **Member** (aktif/non-aktif).
    - Catat **Keuangan** (biar saldo nggak selisih).
    - Jadwalkan **Event** dan **Sesi Latihan**.
    - Catat **Absensi** tiap kali main.
    - Update skor **Leaderboard**.
- **Modern UI:** Pakai modal-modal cakep, nggak perlu refresh halaman mulu pas nambah data.

---

## 🚀 Tech Stack

Project ini dibangun pakai teknologi yang simpel tapi powerfull:
- **Backend:** CodeIgniter 3.x (PHP) - Klasik tapi asik.
- **Database:** MySQL.
- **Frontend:** Tailwind CSS (via CDN) - Bikin UI modern tanpa ribet.
- **Icon:** Material Symbols & Google Fonts.
- **Charts:** Chart.js buat visualisasi data.
- **PWA Ready:** Sudah ada Manifest dan Service Worker biar bisa di-install di HP.

---

## 🛠️ Cara Setup (Buat Developer)

Kalau mau jalanin project ini di lokal (pake XAMPP):

1. **Clone project** ini ke folder `htdocs` kamu.
2. **Siapkan Database:**
   - Masuk ke `phpMyAdmin`.
   - Buat database baru namanya `ubc_db`.
   - Import file `database.sql` yang ada di root project.
3. **Konfigurasi:**
   - Cek file `application/config/database.php`, sesuaikan username & password MySQL kamu (biasanya root/kosong).
4. **Buka di Browser:**
   - Alamat: `http://localhost/ubc`

---

## 📝 Catatan
Project ini udah migrasi total dari Bootstrap ke **Tailwind CSS**. Jadi tampilannya jauh lebih *fresh* dan *dark mode* nya konsisten banget sesuai desain awal.

Selamat mencoba, smash dengan hati! 🏸🔥
