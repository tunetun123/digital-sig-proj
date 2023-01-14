<div class="container mt-2">
    <h3 class="text-center">Pembuatan Tanda Tangan Digital</h3>
    <div class="row">
        <div class="col-md-8 mt-3">
            <h4>Step 1 : Upload File PDF yang akan dibuat tanda tangan digital</h4>
            <form id="form" action="<?= BASEURL; ?>/sign" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="formFile" class="form-label">File Dokumen (*.PDF)</label>
                    <input class="form-control" name="dokumen" type="file" accept=".pdf" id="formFile">
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" name="uploadbtn" id="generateBtn" class="btn btn-primary">Upload File</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="../public/js/form.js"></script> -->