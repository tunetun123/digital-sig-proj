<div class="container mt-5">
    <div class="card border-success">
        <div class="card-header text-bg-success">
            Dokumen ini Terverifikasi
        </div>
        <div class="table-responsive-md">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th scope="row">Ditandatangani oleh</th>
                        <td><?= $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Divisi</th>
                        <td><?= $data['divisi']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        <td><?= $data['jabatan']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Dokumen</th>
                        <td><?= $data['judul_dokumen']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td><?= $data['tgl_sah']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Waktu</th>
                        <td><?= $data['waktu_sah']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Kunci Publik</th>
                        <td><?= $data['k_publik']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>