<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10 col-sm-12">
            <!-- Alerts -->
            <?php if (session()->has('alert')) : ?>
                <div class="alert alert-danger"><?= session('alert') ?></div>
            <?php endif; ?>
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger"><?= session('errors') ?></div>
            <?php endif; ?>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>

            <!-- Testimoni Produk -->
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between" style="background-color: #6c757d;">
                    <b>Testimoni Produk <u><?= $produk['nama_produk'] ?></u></b>
                    <button data-bs-toggle="modal" data-bs-target="#addModal" class="ms-auto btn btn-sm btn-success">
                        <i class="fas fa-plus-square"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Bintang</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($testi as $t) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $t->nama_cus ?? 'N/A' ?></td>
                                        <td><?= $t->bintang ?? 'N/A' ?></td>
                                        <td><?= $t->ket_testi ?? 'N/A' ?></td>
                                        <td><?= $t->tanggal_testi ?? 'N/A' ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editTestiModal<?= $t->id_testi ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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
<?php foreach($testi as $t) : ?> 
<div class="modal fade" id="editTestiModal<?= $t->id_testi ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/produk/testiupdate/<?= $t->id_testi ?>" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Customer</label>
                        <input type="text" name="nama_cus" value="<?= $t->nama_cus ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bintang</label>
                        <select name="bintang" class="form-control" required>
                            <option value="">-- Pilih Rating --</option>
                            <option value="1" <?= $t->bintang == 1 ? 'selected' : '' ?>>⭐</option>
                            <option value="2" <?= $t->bintang == 2 ? 'selected' : '' ?>>⭐⭐</option>
                            <option value="3" <?= $t->bintang == 3 ? 'selected' : '' ?>>⭐⭐⭐</option>
                            <option value="4" <?= $t->bintang == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐</option>
                            <option value="5" <?= $t->bintang == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="ket_testi" value="<?= $t->ket_testi ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal_testi" value="<?= $t->tanggal_testi ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
</div>
 <?php endforeach; ?>
<!-- Add Testimoni Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/produk/testiadd/<?= $produk['id_produk'] ?>" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Customer</label>
                    <input type="text" name="nama_cus" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bintang</label>
                    <select name="bintang" class="form-control" required>
                        <option value="">-- Pilih Rating --</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="ket_testi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal_testi" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
