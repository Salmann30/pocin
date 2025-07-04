<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">
                    <i class="fas fa-images me-2"></i>
                    Manajemen Event Banner
                </h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Banner
                </button>
            </div>

            <div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg d-flex justify-content-center">
                    <form action="/admin/banner/store" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBannerModalLabel">
                                    <i class="fas fa-plus me-2"></i>
                                    Tambah Banner Baru
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times me-2"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Judul Banner <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul banner" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gambar Banner <span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" accept="image/*" required>
                                            <small class="form-text text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi banner" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Banner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Daftar Banner</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Judul</th>
                                    <th width="20%">Gambar</th>
                                    <th width="35%">Deskripsi</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($banners)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-images fa-3x mb-3"></i>
                                            <p>Belum ada banner yang ditambahkan</p>
                                        </div>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $no = 1; foreach ($banners as $b): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <span class="fw-medium"><?= esc($b['title']) ?></span>
                                    </td>
                                    <td>
                                        <img src="/uploads/<?= esc($b['image']) ?>" 
                                             class="img-thumbnail" 
                                             width="80" 
                                             height="60" 
                                             style="object-fit: cover;"
                                             alt="<?= esc($b['title']) ?>">
                                    </td>
                                    <td>
                                        <span class="text-muted"><?= esc($b['description']) ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button class="btn btn-outline-warning" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editModal<?= $b['id'] ?>"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal<?= $b['id'] ?>"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $b): ?>
            
            <div class="modal fade" id="editModal<?= $b['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $b['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg d-flex justify-content-center">
                    <form action="/admin/banner/update/<?= $b['id'] ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?= $b['id'] ?>">
                                    <i class="fas fa-edit me-2"></i>
                                    Edit Banner
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times me-2"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Judul Banner <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" value="<?= esc($b['title']) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ganti Gambar (opsional)</label>
                                            <input type="file" name="image" class="form-control" accept="image/*">
                                            <input type="hidden" name="old_image" value="<?= esc($b['image']) ?>">
                                            <small class="form-text text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" required><?= esc($b['description']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Saat Ini</label>
                                    <div class="mt-2">
                                        <img src="/uploads/<?= esc($b['image']) ?>" 
                                             class="img-thumbnail" 
                                             width="150" 
                                             alt="<?= esc($b['title']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save me-2"></i>
                                    Update Banner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="deleteModal<?= $b['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $b['id'] ?>" aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center">
                    <form action="/admin/banner/delete/<?= $b['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel<?= $b['id'] ?>">
                                    <i class="fas fa-exclamation-triangle me-2 text-danger"></i>
                                    Konfirmasi Hapus
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times me-2"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <p class="mb-3">Apakah Anda yakin ingin menghapus banner:</p>
                                    <strong class="d-block">"<?= esc($b['title']) ?>"</strong>
                                    <img src="/uploads/<?= esc($b['image']) ?>" class="w-50" alt="">
                                    <p class="small text-muted mt-3">Tindakan ini tidak dapat dibatalkan.</p>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-2"></i>
                                    Ya, Hapus
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>

<style>
/* General Enhancements */
.card {
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    overflow: hidden;
}

.modal-content {
    border-radius: 0.5rem;
}

.img-thumbnail {
    border-radius: 0.375rem;
    object-fit: cover;
}

/* Header */
.d-flex.justify-content-between h3 {
    font-weight: 600;
}

/* Table Enhancements */
.table th {
    font-weight: 600;
    white-space: nowrap; /* Mencegah header tabel terpotong */
}
.table td {
    vertical-align: middle;
}
.table tbody tr:hover {
    background-color: #f1f5f9;
}

/* Button & Button Group */
.btn {
    border-radius: 0.375rem;
    font-weight: 500;
}
.btn-group > .btn:not(:last-child) {
    margin-right: 0.25rem;
}
.btn-group > .btn {
    border-radius: 0.375rem !important;
}

/* Modal Enhancements */
.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}
.modal-title {
    font-weight: 600;
}

/* Form Styling */
.form-label {
    font-weight: 500;
}
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

/* Empty State */
.text-muted i.fa-images {
    opacity: 0.5;
}
</style>

<?= $this->endSection(); ?>