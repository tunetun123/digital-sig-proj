<div class="container mt-3">
    <div class="card text-center border-success">
        <div class="card-header text-center text-bg-success">
            Tanda Tangan Digital Berhasil dibuat
        </div>
        <div class="card-body text-center">
            <p>Silahkan Download QR-Code dibawah ini</p>
            <img src="<?= $data['qr']; ?>" class="img-thumbnail">
            <br>
            <a class="btn btn-md btn-success mt-3" href="<?= $data['qr']; ?>" download>Download QR-Code</a>
            <p class="mt-4">atau dapat menyalin tanda tangan dalam bentuk kode dibawah ini</p>
            <input type="text" class="form-control text-center" name="sig" value="<?= $data['sig']; ?>" readonly>
        </div>
    </div>
</div>