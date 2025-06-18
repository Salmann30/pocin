<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10 col-sm-12 col-12">
            <?php if (session()->has('alert')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('alert') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between" style="background-color: #6c757d;">
                    <b>Kategori</b>

                    <button data-bs-toggle="modal" data-bs-target="#addModal" class="ms-auto btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Penjelasan</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kategori as $category) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $category['kategori'] ?></td>
                                        <td><?= $category['penjelasan'] ?></td>
                                        <td><img class="img-fluid" style="width: 50px;" src="<?= base_url('') ?><?= $category['img_kategori'] ?>" alt=""></td>
                                        <td><?= $category['total_subkategori'] ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#editKatModal<?= $category['id_kat'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('/admin/katalog/deleteKat/') ?><?= $category['id_kat'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Kategori ini?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url();?>/admin/katalog/addkat" method="post" class="modal-content" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fs-bold" id="newDataModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control custom-input" placeholder="Masukkan Nama Kategori" required autofocus>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Penjelasan</label>
                                <input type="text" id="pen" name="pen" class="form-control custom-input" placeholder="Masukkan Penjelasannya" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Foto</label>
                                <input class="form-control custom-input" type="file" name="img" required>
                                <small class="form-text text-muted">*ukuran foto harus kurang dari 400kb</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php foreach ($kategori as $subcategory) : ?>
    <div class="modal fade" id="editKatModal<?= $subcategory['id_kat'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Subkategori</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <form action="<?= base_url('admin/katalog/editKat/' . $subcategory['id_kat']) ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control custom-input" id="nama" name="nama" value="<?= $subcategory['kategori'] ?>" required>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>