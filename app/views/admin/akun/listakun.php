<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Kunci</h1>
    <div class="container">
        <table class="table table-responsive-md table-hover">
            <thead>
                <tr>
                    <th scope="col">ID User</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Role</th>
                    <th scope="col">Username</th>
                    <th scope="col">Hash Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['list'] as $list) : ?>
                    <tr>
                        <th scope="row"><?= $list->id_user; ?></th>
                        <td><?= $list->nik; ?></td>
                        <td><?= $list->role; ?></td>
                        <td><?= $list->username; ?></td>
                        <td><?= $list->password; ?></td>
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