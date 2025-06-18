<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<style>
    @media(max-width:430px){
        .custom-hp {
            height:100px!important;
            width:100%;
        }
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10 col-sm-12 col-12">
            <?php if (session()->has('alert')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('alert') ?>
                </div>
            <?php endif; ?>
<?php if (user()->fullname == null || 
            user()->nama_umkm == null || 
            user()->ig_user == null || 
            user()->alamat == null ||
            user()->user_img == 'img/profile/default.jpg' ||
            user()->notlp == null) : ?>
        <div class="alert alert-warning" role="alert">
            <p>Silahkan Menuju edit profile dan lengkapi profile anda.  <a href="<?= base_url('/profile/edit')?>"> Klik Disini</a></p>
        </div>
    <?php endif; ?>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between" style="background-color: #6c757d;">
                    <b>Produk & Jasa</b>

                    <button data-bs-toggle="modal" data-bs-target="#addModal" class="ms-auto btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori(sub)</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $product['nama_produk'] ?></td>
                                        <td><?= $product['kategori'] ?>(<?= $product['subkat'] ?>)</td>
                                        <td>Rp.<?= number_format($product['harga_produk'], 0, ',', '.') ?></td>
                                        <td><?= $product['stok_produk'] ?></td>
                                        <td>
                                            <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                                            <a data-bs-toggle="modal" data-bs-target="#detailProdukModal<?= $product['id_produk'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> &nbsp;

                                            <a href=" <?= base_url('/umkm/produk/deleteProduk/') ?><?= $product['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Produk ini?')"><i class="fas fa-trash-alt"></i></a>
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
<style>
    .custom-input {
    padding: 4px 8px; /* Mengurangi padding */
    font-size: 14px;  /* Ukuran font */
    line-height: 1.2; /* Menyesuaikan tinggi garis */
    height: auto;     /* Biarkan tinggi mengikuti konten */
}
</style>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('/umkm/produk/add') ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="newDataModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" id="Nama" name="Nama" class="form-control" placeholder="Masukkan Nama Produk" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Sub Kategori</label>
                                <select name="Subkat" id="Subkat" class="form-select form-control">
                                    <?php foreach ($subcategories as $category) : ?>
                                        <option value="<?= $category['id_subkat'] ?>"><?= $category['subkat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">*Jika tidak ada, hubungi admin</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-1">Harga</label>
                                <input type="text" id="Harga" name="Harga" class="form-control" placeholder="Masukkan harga Produk" required>
                                  <small class="text-muted">*Cukup angka saja!</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-1">Stok</label>
                                <input type="text" id="Stok" name="Stok" class="form-control" placeholder="Masukkan Stok Produk" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto Produk (1)</strong></label>
                                <input class="form-control" type="file" name="img" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto Produk (2)</strong></label>
                                <input class="form-control" type="file" name="img2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto Produk (3)</strong></label>
                                <input class="form-control" type="file" name="img3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-1">Keterangan</label>
                                <textarea id="Ket" name="Ket" class="form-control custom-hp" placeholder="Masukkan Keterangan Produk" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php foreach ($products as $product) : ?>
    <div class="modal fade" id="detailProdukModal<?= $product['id_produk'] ?>" tabindex="-1" aria-labelledby="editProdukModalLabel<?= $product['id_produk'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editProdukModalLabel<?= $product['id_produk'] ?>">Edit Produk</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                   <form action="<?= base_url('/umkm/produk/edit/') . $product['id_produk'] ?>" method="post" enctype="multipart/form-data">

                        <div class="row mb-1 justify-content-center">
                            <div class="d-flex flex-wrap text-center justify-content-center">
                                <div class="col-4 text-center">
                                    <img src="<?= base_url($product['img_produk']) ?>" alt="Foto 1" class="img-fluid rounded" style=" width: 300px; height: auto;">
                                    <p class="mt-2">Foto (1)</p>
                                </div>
                            
                                <?php if($product['img_produk2']) : ?>
                                <div class="col-4 text-center">
                                    <img src="<?= base_url() . $product['img_produk2'] ?>" alt="Foto 2" class="img-fluid rounded" style="width: 300px; height: auto;">
                                    <p class="mt-2">Foto (2)</p>
                                </div>
                                <?php endif;?>
                            
                                <?php if($product['img_produk3']) : ?>
                                <div class="col-4 text-center">
                                    <img src="<?= base_url() . $product['img_produk3'] ?>" alt="Foto 3" class="img-fluid rounded" style="width: 300px; height: auto;">
                                    <p class="mt-2">Foto (3)</p>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" id="Nama" name="Nama" class="form-control custom-input" value="<?= $product['nama_produk']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label m-1">Kategori</label>
                                            <input type="text" id="kategori" name="kategori" class="form-control custom-input" value="<?= $product['kategori']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label m-1">Sub Kategori</label>
                                            <select name="Subkat" id="Subkat" class="form-select form-control custom-input">
                                                <?php foreach ($subcategories as $subcategory) : ?>
                                                    <option value="<?= $subcategory['id_subkat'] ?>" <?= ($product['id_subkat'] == $subcategory['id_subkat']) ? 'selected' : '' ?>>
                                                        <?= $subcategory['subkat'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Harga</label>
                                    <input type="text" id="Harga" name="Harga" class="form-control custom-input" value="<?= $product['harga_produk']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Stok</label>
                                    <input type="text" id="Stok" name="Stok" class="form-control custom-input" value="<?= $product['stok_produk']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label mb-1"><strong>Foto (1)</strong></label>
                                    <input class="form-control custom-input" type="file" name="img">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1"><strong>Foto (2)</strong></label>
                                    <input class="form-control custom-input" type="file" name="img2">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1"><strong>Foto (3)</strong></label>
                                    <input class="form-control custom-input" type="file" name="img3">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Keterangan</label>
                                    <textarea id="Ket" name="Ket" class="form-control custom-hp custom-input"><?= $product['ket_produk']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mb-2 pb-0">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal Detail -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alamatInput = document.getElementById('Ket');
        const alamatCount = document.getElementById('KetCount');

        alamatInput.addEventListener('input', function() {
            const currentLength = alamatInput.value.length;
            alamatCount.textContent = currentLength + '/50 characters';
        });


    });
</script>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>