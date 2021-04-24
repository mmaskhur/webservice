<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/create" class="btn btn-primary mt">Tambah Data Komik</a>
            <h1 class="mt-2">Daftar Akun</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Address</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $data = json_decode($akun, true) ?>
                    <?php foreach ($data as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['id']; ?></td>
                            <td><?= $k['username']; ?></td>
                            <td><?= $k['firstname']; ?></td>
                            <td><?= $k['lastname']; ?></td>
                            <td><?= $k['address']; ?></td>
                            <td>
                                <a href="/edit/<?= $k['id']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/delete/<?= $k['id']; ?>" method="get" class="d-inline" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>