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
                    <b>SubKategori</b>

                    <button data-bs-toggle="modal" data-bs-target="#addModal" class="ms-auto btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Produk(total)</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-sm">
                                <?php $no = 1; ?>
                                <?php foreach ($subcategories as $index => $subcategory) : ?>
                                    <tr>
                                        <td><?= ($pager->getCurrentPage() - 1) * $pager->getPerPage() + $index + 1 ?></td>
                                        <td><?= $subcategory['id_subkat'] ?></td>
                                        <td><?= $subcategory['kategori'] ?></td>
                                        <td><?= $subcategory['subkat'] ?></td>
                                        <td><?= $subcategory['total_produk'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal<?= $subcategory['id_subkat'] ?>"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/katalog/deleteSub/' . $subcategory['id_subkat']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Sub Kategorinya?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="pagination d-flex justify-content-center mt-3">
                        <?= $pager->links() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="<?= base_url('admin/katalog/addSub') ?>" method="post">
            <?= csrf_field() ?>
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="newDataModalLabel">Tambah Sub Kategori</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select form-control custom-input">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id_kat'] ?>"><?= $category['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control custom-input" id="nama" name="nama" placeholder="Masukkan Nama Sub Kategori" required>
                        
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php foreach ($subcategories as $subcategory) : ?>
    <div class="modal fade" id="editSubcategoryModal<?= $subcategory['id_subkat'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Subkategori</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <form action="<?= base_url('admin/katalog/editSub/' . $subcategory['id_subkat']) ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select form-control custom-input">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id_kat'] ?>"><?= $category['kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subkategori</label>
                            <input type="text" class="form-control custom-input" name="subkat" value="<?= $subcategory['subkat'] ?>" required>
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