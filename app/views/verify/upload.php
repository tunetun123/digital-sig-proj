<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            Verifikasi Dokumen Digital
        </div>
        <div class="card-body text-center">
            <p>Silahkan upload dokumen digital yang sudah di share di bawah ini.</p>
            <form action="<?= BASEURL; ?>/verify/verifybydoc" method="POST">
                <div class="mb-3 mt-3">
                    <input class="form-control" type="file" accept=".pdf" id="formFile">
                </div>
                <div class="mb-3 mt-3">
                    <p>Nama Penandatangan</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>--Nama Penandatangan--</option>
                        <option value="1">Aco</option>
                        <option value="2">Baco</option>
                        <option value="3">Becce</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <button type="button" class="btn btn-success btn-sm">Verifikasi by Dokumen</button>
                </div>
            </form>
        </div>
    </div>
</div>