<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Kunci</h1>
    <div class="container">
        <table class="table table-responsive-md table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Kunci</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Nilai n</th>
                    <th scope="col">Kunci Publik</th>
                    <th scope="col">Kunci Privat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['list'] as $list) : ?>
                    <tr>
                        <th scope="row"><?= $list->id_kunci; ?></th>
                        <td><?= $list->id_user; ?></td>
                        <td><?= $list->nilai_n; ?></td>
                        <td><?= $list->kunci_publik; ?></td>
                        <td><?= $list->kunci_privat; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->