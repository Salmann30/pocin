<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<div class="container mt-4">
    <h3 class="mb-3">Manajemen Event Banner</h3>

    <!-- Tambah Banner -->
    <form action="/admin/banner/store" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="row g-2">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Judul Banner" required>
            </div>
            <div class="col-md-4">
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="description" class="form-control" placeholder="Deskripsi" required>
            </div>
            <div class="col-md-1 d-grid">
                <button class="btn btn-success">Tambah</button>
            </div>
        </div>
    </form>

    <!-- Tabel Data -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($banners as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($b['title']) ?></td>
                <td><img src="/uploads/<?= esc($b['image']) ?>" width="100"></td>
                <td><?= esc($b['description']) ?></td>
                <td>
                    <!-- Button trigger modal edit -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $b['id'] ?>">Edit</button>

                    <!-- Button trigger modal delete -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $b['id'] ?>">Hapus</button>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal<?= $b['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $b['id'] ?>" aria-hidden="true">
              <div class="modal-dialog">
                <form action="/admin/banner/update/<?= $b['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" name="title" class="form-control" value="<?= esc($b['title']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Ganti Gambar (opsional)</label>
                                <input type="file" name="image" class="form-control">
                                <small>Gambar saat ini: <img src="/uploads/<?= esc($b['image']) ?>" width="70"></small>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control"><?= esc($b['description']) ?></textarea>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="deleteModal<?= $b['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $b['id'] ?>" aria-hidden="true">
              <div class="modal-dialog">
                <form action="/admin/banner/delete/<?= $b['id'] ?>" method="get">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Yakin ingin menghapus banner "<strong><?= esc($b['title']) ?></strong>"?
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>

            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>