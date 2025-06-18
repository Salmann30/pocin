<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error); ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Tambahkan skrip JavaScript untuk auto-close -->
<script>
    // Auto close alert setelah 5 detik (5000 ms)
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            // Hapus kelas 'show' untuk mulai menyembunyikan
            alert.classList.remove('show');
            alert.classList.add('fade');
            
            // Tunggu transisi selesai sebelum menghapus elemen dari DOM
            setTimeout(() => {
                alert.remove();
            }, 300); // Delay 300 ms untuk transisi fade
        });
    }, 5000); // 5000 ms = 5 detik
</script>


    <div class="row">
        <div class="col-lg-3 col-sm-6 col-6 mb-2">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-box" style="color: #ffff;"></i> <br>
                    <strong class="text-light">Produk</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <b>
                        <p class="card-text mb-3">Jumlah: <br>
                            <?= $totalPro ?> </p>
                    </b>
                    <a href="<?= base_url('/admin/katalog/produk'); ?>" class="btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 mb-2">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-luggage-cart" style="color: #ffff;"></i> <br>
                    <strong class="text-light">Kategori</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <b>
                        <p class="card-text mb-3">Jumlah: <br>
                            <?= $totalKat ?></p>
                    </b>
                    <a href="<?= base_url('/admin/katalog/index'); ?>" class="btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 mb-2">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-suitcase" style="color: #ffff;"></i> <br>
                    <strong class="text-light">SubKat</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <b>
                        <p class="card-text mb-3">Jumlah: <br>
                            <?= $totalSub ?></p>
                    </b>
                    <a href="<?= base_url('/admin/katalog/sub'); ?>" class="btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 mb-2">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-users" style="color: #ffff;"></i> <br>
                    <strong class="text-light">UMKM</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <b>
                        <p class="card-text mb-3">Jumlah: <br>
                            <?= $totalUmkm ?></p>
                    </b>
                    <a href="<?= base_url('/admin/manage/'); ?>" class="btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card shadow">
                <div class="card-header  text-white d-flex justify-content-between" style="background-color: black;">
                    <b>Galeri</b>
                    <button data-bs-toggle="modal" data-bs-target="#addModal" class="ms-auto btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($users as $index => $user) : ?>
                                    <tr>
                                        <td><?= ($pager->getCurrentPage() - 1) * $pager->getPerPage() + $index + 1 ?></td>
                                        <td><img class="img-fluid" style="width: 50px;" src="<?= base_url('beranda/img/') ?><?= $user['nama_gambar'] ?>" alt=""></td>
                                        <td><?= $user['nama_keg'] ?></td>
                                        <td><?= $user['tanggal_gambar'] ?></td>
                                        <td><?= $user['ket_gambar'] ?></td>
                                        
                                        <td>
                                            <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                                            <a data-bs-toggle="modal" data-bs-target="#detailUmkmModal<?= $user['id'] ?>" class="btn btn-sm btn-primary d-inline-block"><i class="fas fa-info-circle"></i></a>
                                        
                                            <a href="<?= base_url('/admin/gambar/delete') . $user['id'] ?>" class="btn btn-sm btn-danger d-inline-block" onclick="return confirm('Apakah Anda Yakin Menghapus UMKM ini?')"><i class="fas fa-trash-alt"></i></a>
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
<style>

</style>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <form action="<?= base_url('/admin/addPic') ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fs-bold" id="newDataModalLabel">Tambah Foto Galeri</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Tanggal</label>
                                <input type="date" id="Tanggal" name="Tanggal" class="form-control custom-input" placeholder="Masukkan Tanggal" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Nama Kegiatan</label>
                                <input type="text" id="nama kegiatan" name="keg" class="form-control custom-input" placeholder="Masukkan Nama Kegiatan" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Keterangan</label>
                                <input type="text" id="Ket" name="Ket" class="form-control custom-input" placeholder="Masukkan Keterangan" maxlength="50" required>
                                <small id="KetCount" class="form-text text-muted">0/50 huruf</small>
                            </div>
                            <div class="mb-2">
                                <label class="form-label"><strong>Foto</strong></label>
                                <input class="form-control custom-input" type="file" name="img" required>
                                <small class="form-text text-muted">*ukuran foto harus kurang dari 400kb dan dengan skala 16:9</small>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer mb-2 pb-0">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="detailUmkmModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="detailUmkmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="detailUmkmModalLabel">Detail Foto</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <!-- Form ditambahkan enctype untuk mendukung upload file -->
                <form action="<?= base_url('/admin/edit/Gambar/'. $user['id'])?>" method="post" id="edit-profile-form<?= $user['id'] ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Kolom untuk gambar -->
                            <div class="col-md-8 text-center">
                                <img src="<?= base_url('beranda/img/'.$user['nama_gambar']) ?>" alt="User Image" class="rounded border img-profile mb-4" width="auto" height="250">
                                
                            </div>
                            <!-- Kolom untuk form -->
                            <div class="col-md-4">
                                <div class=" mb-2">
                                    <label class="form-label">Nama Kegiatan </label>
                                    <input type="text" class="form-control custom-input" id="nama" name="nama" value="<?= $user['nama_keg'] ?>" >
                                </div>
                                <div class=" mb-2">
                                    <label class="form-label">Tanggal </label>
                                    <input type="date" class="form-control custom-input" id="tanggal" name="tanggal" value="<?= $user['tanggal_gambar'] ?>" >
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control custom-input" id="ket" name="ket" value="<?= $user['ket_gambar'] ?>" >
                                </div>
                                
                                <div class="mb-4">
                                    <label for="userImage" class="form-label">Foto:</label>
                                    <img id="preview-image<?= $user['id'] ?>" style="width: 45%; display:none;" class="img-profile mb-4">
                                    <div class="input-group">
                                        <input type="file" id="gambar<?= $user['id'] ?>" name="img" accept="image/*" class="form-control custom-input text-center">
                                        <button type="button" id="save-cropped-image<?= $user['id'] ?>" class="btn btn-outline-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                    <small class="form-text text-muted">*ukuran foto harus kurang dari 400kb dan skala 16:9</small>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alamatInput = document.getElementById('Ket');
        const alamatCount = document.getElementById('KetCount');

        alamatInput.addEventListener('input', function() {
            const currentLength = alamatInput.value.length;
            alamatCount.textContent = currentLength + '/50 characters';
        });


    });
    
    document.getElementById('gambar<?= $user['id'] ?>').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const preview = document.getElementById('preview-image<?= $user['id'] ?>');
            preview.src = event.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

</script>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>