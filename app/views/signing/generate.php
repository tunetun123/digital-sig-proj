<div class="container mt-2">
    <h3 class="text-center">Pembuatan Tanda Tangan Digital</h3>
    <div class="row">
        <div class="col-md-8 mt-3">
            <h4>Step 2 : Masukkan Kunci Privat anda untuk generate tanda tangan</h4>
            <form id="formgenerate" action="<?= BASEURL; ?>/sign/sigproses" method="POST">
                <div class="mb-3 mt-3">
                    <label for="id-dokumen" class="form-label">ID Dokumen</label>
                    <input class="form-control" type="text" id="id-dokumen" name="id-dokumen" value="<?= $data['id_dokumen']; ?>" readonly>
                </div>

                <div class="mb-3 mt-3">
                    <label for="nama-dokumen" class="form-label">Nama Dokumen</label>
                    <input class="form-control" type="text" id="nama-dokumen" name="nama-dokumen" value="<?= $data['judul_dokumen']; ?>" readonly>
                </div>

                <div class="mb-3 mt-3">
                    <label for="nilaiHash" class="form-label">Nilai Hash</label>
                    <input class="form-control" type="text" id="nilaihash" name="nilaihash" value="<?= $data['hash']; ?>" readonly>
                </div>

                <div class="mb-3 mt-3">
                    <label for="formkunci" class="form-label">Kunci Privat</label>
                    <div class="mt-2">
                        <?php Flasher::flash(); ?>
                    </div>
                    <input class="form-control" type="password" id="formkunci" name="kunci-privat" placeholder="Masukkan Kunci Privat">
                </div>

                <div class="mt-5">
                    <button type="submit" id="btnbatal" name="btnbatal" class="btn btn-danger">Batal Buat</button>
                    <button type="submit" id="btngenerate" name="btngenerate" class="btn btn-primary">Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>