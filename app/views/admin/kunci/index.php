<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pembentukan Kunci</h1>

    <div class="container">
        <form id="createkey" action="<?= BASEURL; ?>/admin/createkey" method="POST">
            <div class="row">
                <label for="namauser" class="col-md-2 col-form-label">Nama User</label>
                <div class="col-md-8">
                    <select name="iduser" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Nama User</option>
                        <?php foreach ($data['listname'] as $option) : ?>
                            <option value="<?= $option->id_user; ?>"><?= $option->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <label for="nilaip" class="col-md-2 col-form-label">Bilangan Prima p</label>
                <div class="col-md-3">
                    <input type="number" name="nilaip" id="nilaip" class="form-control" placeholder="p" min="2">
                </div>

                <label for="nilaiq" class="col-md-2 col-form-label">Bilangan Prima q</label>
                <div class="col-md-3">
                    <input type="number" name="nilaiq" id="nilaiq" class="form-control" placeholder="q" min="2">
                </div>
            </div>

            <div class="row mt-3">
                <label for="nilain" class="col-md-2 col-form-label">Nilai n</label>
                <div class="col-md-3">
                    <input type="text" name="nilain" id="nilain" class="form-control" readonly>
                </div>

                <label for="nilaitotient" class="col-md-2 col-form-label">Nilai &phi;(n)</label>
                <div class="col-md-3">
                    <input type="text" name="nilaitotient" id="nilaitotient" class="form-control" readonly>
                </div>
            </div>

            <div class="row mt-3">
                <label for="kuncipublik" class="col-md-2 col-form-label">Kunci Publik e</label>
                <div class="col-md-3">
                    <input type="text" name="kuncipublik" id="kuncipublik" class="form-control" placeholder="e">
                </div>

                <label for="kunciprivat" class="col-md-2 col-form-label">Kunci privat d</label>
                <div class="col-md-3">
                    <input type="text" name="kunciprivat" id="kunciprivat" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <button type="button" id="euclidean" class="btn btn-primary">Tes Euclidean</button>
                    <!-- <button type="button" id="kunciprivat" class="btn btn-outline-secondary">Secondary</button> -->
                    <button type="submit" value="submit" name="simpankunci" class="btn btn-success">Simpan Kunci</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->