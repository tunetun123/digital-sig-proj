<div class="container mt-3">
    <h4 class="text-center">
        Aplikasi Digital Signature menggunakan Algoritma
        RSA & MD5 untuk Otentikasi Dokumen Digital Rumah Sakit
    </h4>

    <?php if (isLoggedIn()) : ?>
        <div class="row mt-5 text-md-start">
            <div class="col-sm-8">
                <h2>About App</h2>
                <p>Aplikasi Digital signature ini merupakan tool yang digunakan untuk membuat tanda tangan digital. aplikasi ini menggunakan metode kriptografi RSA dan fungsi hash MD5. kriptografi RSA digunakan sebagai metode untuk melakukan <b>otentikasi</b> terhadap dokumen yang di tanda tangan sehingga diketahui siapa dan kapan dokumen tersebut disahkan. Fungsi hash MD5 digunakan sebagai metode mendapatkan <i>message-digest</i> dari sebuah dokumen sehingga dapat menjamin <b>integritas</b> dari dokumen yang di tanda tangan.</p>
            </div>
        </div>

        <div class="row mt-5 text-md-start">
            <div class="col-sm-6">
                <h2>Langkah Verifikasi</h2>
                <ol>
                    <li>Pilih Menu <b>Verifikasi Dokumen</b> yang terdapat pada bagian Navbar diatas</li>
                    <li>Izinkan browser yang digunakan untuk mengakses kamera perangkat</li>
                    <li>Lakukan scan pada QR-Code untuk mendapatkan tanda tangan digital</li>
                    <li>Pilih nama penandatangan</li>
                    <li>Jika berhasil akan menampilkan daftar penandatangan</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <h2>Langkah Pembuatan Digital Signature</h2>
                <ol>
                    <li>Pilih Menu <b>Buat TTD Digital</b> yang terdapat pada bagian Navbar diatas</li>
                    <li>Upload File PDF yang akan ditanda tangan</li>
                    <li>Masukkan Kunci Privat yang sudah didaftarkan admin sebelumnya</li>
                    <li>Klik Generate untuk mendapatkan digital signature dokumen tersebut</li>
                    <li>Jika berhasil akan menampilkan QR-Code dan kode tanda tangan</li>
                    <li>Hasil QR dapat diunduh dan dimasukkan kedalam dokumen sebelum dibagikan/dicetak</li>
                </ol>
            </div>
        </div>
    <?php else : ?>
        <div class="row mt-5 text-md-start">
            <div class="col-sm-8">
                <h2>About App</h2>
                <p>Aplikasi Digital signature ini merupakan tool yang digunakan untuk membuat tanda tangan digital. aplikasi ini menggunakan metode kriptografi RSA dan fungsi hash MD5. kriptografi RSA digunakan sebagai metode untuk melakukan <b>otentikasi</b> terhadap dokumen yang di tanda tangan sehingga diketahui siapa dan kapan dokumen tersebut disahkan. Fungsi hash MD5 digunakan sebagai metode mendapatkan <i>message-digest</i> dari sebuah dokumen sehingga dapat menjamin <b>integritas</b> dari dokumen yang di tanda tangan.</p>
            </div>
        </div>

        <div class="row mt-5 text-md-start">
            <div class="col-sm-8">
                <h2>Langkah Verifikasi</h2>
                <ol>
                    <li>Pilih Menu <b>Verifikasi Dokumen</b> yang terdapat pada bagian Navbar diatas</li>
                    <li>Izinkan browser yang digunakan untuk mengakses kamera perangkat</li>
                    <li>Lakukan scan pada QR-Code untuk mendapatkan tanda tangan digital</li>
                    <li>Pilih nama penandatangan</li>
                    <li>Jika berhasil akan menampilkan daftar penandatangan</li>
                </ol>
            </div>
        </div>
    <?php endif; ?>
</div>