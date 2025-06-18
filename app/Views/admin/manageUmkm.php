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
                <div class="card-header  text-white d-flex justify-content-between" style="background-color: #6c757d;">
                    <b>UMKM List</b>
                    <div class="d-flex justify-content-end">
                        <form action="<?= base_url('/admin/manage') ?>" method="get" class="d-flex">
                            <input class="form-control custom-input me-2" type="search" name="keyword" placeholder="Cari UMKM..." aria-label="Search" value="<?= isset($keyword) ? $keyword : '' ?>">
                            <button class="btn btn-sm btn-outline-success" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-dark">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama Toko</th>
                                    <th scope="col">No WA</th>
                                    <th scope="col">Produk(total)</th>
                                    <th scope="col">Verif</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($users as $index => $user) : ?>
                                    <tr>
                                        <td><?= ($pager->getCurrentPage() - 1) * $pager->getPerPage() + $index + 1 ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['nama_umkm'] ?></td>
                                        <td><?= $user['notlp'] ?></td>
                                        <td><?= $user['total_produk'] ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input verif-checkbox" type="checkbox" id="flexCheckDefault<?= $user['id'] ?>" data-id="<?= $user['id'] ?>" <?= $user['tipeakun'] == 1 ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="flexCheckDefault<?= $user['id'] ?>"></label>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                                            <a data-bs-toggle="modal" data-bs-target="#detailUmkmModal<?= $user['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i></a>

                                            <a href="<?= base_url('/admin/manage/delete/') . $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus UMKM ini?')"><i class="fas fa-trash-alt"></i></a>
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
<!-- Modal Detail UMKM -->
<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="detailUmkmModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="detailUmkmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="detailUmkmModalLabel">Detail UMKM</h5>
                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <!-- Form ditambahkan enctype untuk mendukung upload file -->
                <form action="<?= base_url('/admin/edit/UMKM/'. $user['id'])?>" method="post" id="edit-profile-form<?= $user['id'] ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Kolom untuk gambar -->
                            <div class="col-md-4 text-center">
                                <img src="<?= base_url($user['user_img']) ?>" alt="User Image" class="rounded border img-profile mb-4" width="auto" height="150">
                                
                            </div>
                            <!-- Kolom untuk form -->
                            <div class="col-md-8">
                                <div class=" mb-2">
                                    <label for="umkmNama" class="form-label">Nama Pemilik:</label>
                                    <input type="text" class="form-control custom-input" id="namaumkm" name="fullname" value="<?= $user['fullname'] ?>" >
                                </div>
                                <div class="mb-2">
                                    <label for="umkmNamaToko" class="form-label">Nama Toko:</label>
                                    <input type="text" class="form-control custom-input" id="umkm" name="nama_umkm" value="<?= $user['nama_umkm'] ?>" >
                                </div>
                                <div class="mb-2">
                                    <label for="umkmUsername" class="form-label">Username:</label>
                                    <input type="text" class="form-control custom-input" id="username" name="username" value="<?= $user['username'] ?>" readonly>
                                </div>
                                                                <div class="mb-2">
                                    <label for="umkmUsername" class="form-label">Instagram:</label>
                                    <input type="text" class="form-control custom-input" id="username" name="insta" value="<?= $user['ig_user'] ?>" >
                                </div>
                                <div class="mb-2">
                                    <label for="umkmEmail" class="form-label">Email:</label>
                                    <input type="text" class="form-control custom-input" id="email" name="email" value="<?= $user['email'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="umkmNoTelpon" class="form-label">No Telpon:</label>
                                    <input type="text" class="form-control custom-input" id="notlp" name="notlp" value="<?= $user['notlp'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="umkmAlamat" class="form-label">Alamat:</label>
                                    <input type="text" class="form-control custom-input" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="umkmTotalProduk" class="form-label ">Produk Total:</label>
                                    <input type="text" class="form-control custom-input" id="totalproduk" name="total_produk" value="<?= $user['total_produk'] ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="userImage" class="form-label">Foto:</label>
                                    <img id="preview-image<?= $user['id'] ?>" style="width: 45%; display:none;" class="img-profile mb-4">
                                    <div class="input-group">
                                        <input type="file" id="gambar<?= $user['id'] ?>" name="gambar" accept="image/*" class="form-control custom-input text-center">
                                        <button type="button" id="save-cropped-image<?= $user['id'] ?>" class="btn btn-outline-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                    <small class="form-text text-muted">*ukuran foto harus kurang dari 400kb dan skala 1:1</small>
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
<!--Modal Crop Foto-->
<script>
    /* Tambahan CSS untuk responsivitas */
#preview-image {
    width: 100%; /* Memastikan gambar cropper menyesuaikan lebar kontainer */
    height: auto;
}
.input-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.form-control {
    flex: 1 1 auto;
    margin-right: 0;
}
.btn {
    flex: 0 0 auto;
}

</script>
<?php foreach ($users as $user) : ?>
    <script>
                var cropper;
                document.getElementById('gambar<?= $user['id'] ?>').addEventListener('change', function(event) {
                    var image = document.getElementById('preview-image<?= $user['id'] ?>');
                    var file = event.target.files[0];
                    var reader = new FileReader();
            
                    reader.onload = function(e) {
                        image.src = e.target.result;
                        image.style.display = 'block';
            
                        // Inisialisasi Cropper.js
                        cropper = new Cropper(image, {
                            aspectRatio: 1, // Sesuaikan aspect ratio sesuai kebutuhan Anda
                            viewMode: false,
                            autoCropArea: 1,
                            responsive: true,
                            background: false
                        });
                    };
            
                    reader.readAsDataURL(file);
                });
            
                document.getElementById('save-cropped-image<?= $user['id'] ?>').addEventListener('click', function(event) {
                        event.preventDefault(); // Mencegah form submit otomatis
                    
                        cropper.getCroppedCanvas().toBlob(function(blob) {
                            var fileInput = document.getElementById('gambar<?= $user['id'] ?>');
                            var file = new File([blob], 'cropped_image.jpg', { type: 'image/jpeg', lastModified: Date.now() });
                    
                            var dataTransfer = new DataTransfer();
                            dataTransfer.items.add(file);
                            fileInput.files = dataTransfer.files;
                    
                            // Submit form setelah input file diisi dengan gambar yang sudah dicrop
                            document.getElementById('edit-profile-form<?= $user['id'] ?>').submit();
                        });
                });
    </script>
<?php endforeach; ?>

<script>
    document.querySelectorAll('.verif-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const userId = this.dataset.id;
            const verified = this.checked;

            fetch(`<?= base_url('admin/manage/verif/') ?>${userId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                body: JSON.stringify({ verified: verified })
            }).then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Failed to verify');
                }
            }).then(data => {
                alert(data.message);
            }).catch(error => {
                console.error('Error:', error);
                alert('Gagal memverifikasi pengguna');
            });
        });
    });
</script>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>