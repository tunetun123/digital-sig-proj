<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            Verifikasi Dokumen Digital
        </div>
        <div class="card-body text-center">
            <!-- <video class="img-fluid mx-auto d-block" autoplay="true" width="250" height="250" id="video-webcam">
                Browsermu tidak mendukung bro, upgrade donk!
            </video> -->
            <div id="qr-reader" style="width: 300px;" class="img-fluid mx-auto d-block"></div>
            <p>Silahkan Scan QR-Code untuk melakukan Verifikasi</p>
            <form action="<?= BASEURL; ?>/verify/verifybyqr" method="POST">
                <div class="mb-3 mt-3">
                    <div class="mt-2"><?php Flasher::flash(); ?></div>
                    <input class="form-control text-center" name="hasilscan" type="text" id="hasilscan" readonly>
                    <!-- <div class="border border-dark p-2 mb-2" id="hasilscan"></div> -->
                </div>
                <div class="mb-3 mt-3">
                    <p>Nama Penandatangan</p>
                    <select class="form-select" name="listnama" aria-label="Default select example">
                        <option selected>--Nama Penandatangan--</option>
                        <?php foreach ($data['listname'] as $option) : ?>
                            <option value="<?= $option->id_kunci; ?>"><?= $option->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" name="qr-submit" id="submit" value="submit" class="btn btn-success btn-sm">Verifikasi by QR-Code</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="<?= BASEURL; ?>/js/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText) {
        document.getElementById('hasilscan').value = decodedText;
        // console.log(`Code matched = ${decodedText}`, decodedResult);
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", {
            fps: 10,
            qrbox: 150
        });
    html5QrcodeScanner.render(onScanSuccess);
</script>