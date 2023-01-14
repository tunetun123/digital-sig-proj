<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Registrasi Akun</h1>

    <div class="container">
        <form id="createkey" action="<?= BASEURL; ?>/admin/akuncreate" method="POST">
            <div class="row">
                <label for="nik" class="col-md-2 col-form-label">Nama Karyawan</label>
                <div class="col-md-8">
                    <select name="nik" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Nama Karyawan</option>
                        <?php foreach ($this->karyawanModel->getKaryawan() as $option) : ?>
                            <option value="<?= $option->nik; ?>"><?= $option->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalidFeedback text-danger">
                        <?php echo $data['err_nik']; ?>
                    </span>
                </div>
            </div>

            <div class="row mt-3">
                <label for="username" class="col-md-2 col-form-label">Username</label>
                <div class="col-md-8">
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    <span class="invalidFeedback text-danger">
                        <?php echo $data['err_username']; ?>
                    </span>
                </div>
            </div>

            <div class="row mt-3">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-8">
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="invalidFeedback text-danger">
                        <?php echo $data['err_password']; ?>
                    </span>
                </div>
            </div>

            <div class="row mt-3">
                <label for="password-rpt" class="col-md-2 col-form-label">Ulangi Password</label>
                <div class="col-md-8">
                    <input type="password" name="password-rpt" id="password-rpt" class="form-control">
                    <span class="invalidFeedback text-danger">
                        <?php echo $data['err_password_rpt']; ?>
                    </span>
                </div>
            </div>

            <div class="row mt-3">
                <label for="role" class="col-md-2 col-form-label">Role</label>
                <div class="col-md-8">
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Role</option>
                        <?php foreach ($this->karyawanModel->getRole() as $option) : ?>
                            <option value="<?= $option->id_role; ?>"><?= $option->role; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalidFeedback text-danger">
                        <?php echo $data['err_role']; ?>
                    </span>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-3">
                    <button type="submit" value="submit" name="buatakun" class="btn btn-success">Register</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->