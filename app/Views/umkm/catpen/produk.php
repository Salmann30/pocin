<?= $this->extend('templates/catpen/index'); ?>
<?= $this->section('page-Content'); ?>
<!-- Begin Page Content -->
<div class="container-xxl flex-grow-1 container-p-y">
	<?php if (session()->getFlashdata('error')) : ?>
	<div id="error-alert" class="alert alert-warning" role="alert">
		<?= session()->getFlashdata('error') ?>
	</div>
	<script>
		// Menunggu 3 detik, kemudian menghilangkan pesan kesalahan
		setTimeout(function() {
		  var errorAlert = document.getElementById('error-alert');
		  if (errorAlert) {
		    errorAlert.remove();
		  }
		}, 3000);
		
		// Menunggu 3 detik, kemudian menghilangkan pesan kesalahan
		setTimeout(function() {
		  var successAlert = document.getElementById('success-alert');
		  if (successAlert) {
		    successAlert.remove();
		  }
		}, 3000);
	</script>
	<?php endif; ?>
	<?php if (session()->getFlashdata('success')) : ?>
	<div id="success-alert" class="alert alert-warning" role="alert">
		<?= session()->getFlashdata('success') ?>
	</div>
	<?php endif; ?>
		<style>
	    .offcanvas-custom {
            width: 800px!important; /* Atur sesuai dengan lebar yang diinginkan */
        }
		.table-container {
		max-height: 300px;
		/* Atur sesuai kebutuhan */
		overflow-y: auto;
		border: 1px solid #ddd;
		border-radius: 0.25rem;
		}
		.table thead th {
		position: sticky;
		top: 0;
		background-color: #f8f9fa;
		/* Sesuaikan warna background dengan tema tabel */
		z-index: 1;
		}
		@media (max-width: 390px) {
    		@media (max-width: 390px) {
		.table thead th {
		font-size: 7pt;
		}
		.form-control-sm {
		font-size: 7pt;
		height:30px;
		width:100%;
		}
		.quantity-input::placeholder {
		font-size: 5pt;
		}
		.quantity-input {
		height: auto;
		width: 2rem;
		}
		.table tbody th,
		td {
		font-size: 7pt;
		}
		.modal-body table {
		font-size: 7pt;
		}
		.modal-body .btn-sm {
		font-size: 7pt;
		padding: 2px 5px;
		}
		.btn, .btn-sm, .btn-rounded, .btn-primary{
		font-size:7pt;
		height:1.5rem;
		width:auto;
		}
		.form-control {
		font-size:7pt;
		height:30px;
		width:100%;
		}
		.input-group-text{
		    width:auto;
		    font-size:7pt;
		    height:30px;
		}
		.text-muted,.form-label{
		    font-size:7pt;
		}
		}
	</style>
	
	<div class="card" style="font-size:9pt;">
		<div class="row mx-2">
			<div class="d-flex col-lg-6">
				<h5 class="text-dark fw-medium card-header">
					Data Produk
				</h5>
			</div>
			<div class="d-flex col-lg-6 align-items-center justify-content-end">
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-sm btn-success me-2 my-2 fw-bold" data-bs-toggle="modal"
						data-bs-target="#newDataModal">Tambah Produk
					</button>
					<div class="dropdown">
						<button class="btn btn-sm btn-primary my-2 fw-bold" type="button" id="dropdownMenuButton1"
							data-bs-toggle="dropdown" aria-expanded="false">
						Import Excel
						</button>
						<ul class="dropdown-menu my-2" aria-labelledby="dropdownMenuButton1">
							<li><a class="text-dark dropdown-item" href="<?= base_url('catpen/contoh.xlsx') ?>">Download
								Contoh</a>
							</li>
							<li><a class="text-dark dropdown-item" data-bs-toggle="modal" data-bs-target="#modalexcel">Upload
								Excel</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-12 d-flex justify-content-end my-4 px-3">
                <form id="search-form" class="input-group d-flex">
                  <input type="search" id="search-input" name="keyword" class="form-control" placeholder="Cari" aria-describedby="search-icon-1">
                  <span id="search-icon-1" class="input-group-text"><i class="fa fa-search"></i></span>
                </form>
            </div>
		</div>
		<div class="table-container mb-5 mx-3 table-responsive">
			<table id="products-table" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="card-header">
						<th class="text-dark fw-bold">Foto</th>
						<th class="text-dark fw-bold">Nama</th>
						<th class="text-dark fw-bold">Harga</th>
						<th class="text-dark fw-bold">Stok</th>
						<th class="text-dark fw-bold">Subkat</th>
						<th class="text-dark fw-bold">Terjual</th>
						<th class="text-dark fw-bold">Edit / Hapus</th>
					</tr>
				</thead>
				<tbody id="products-body" class="table-border-bottom-0">
					<?php $i = 1; ?>
					<?php foreach ($products as $item) : ?>
					<tr class="<?= $item['stok_produk'] != 0 ? 'table-info' : ''; ?>">
				        <td class="fw-bold">ini foto</td>
                        <td class="text-dark fw-medium custom-width"><?= $item['nama_produk']; ?></td>
                        <td class="text-dark"><?= "Rp." . number_format($item['harga_produk'], 0, ',', '.');?></td>
						<td class="<?= $item['stok_produk'] == 0 ? 'text-danger' : ($item['stok_produk'] <= 5 ? 'text-warning' : 'text-success'); ?> fw-bold">
                        <?= $item['stok_produk']  ?>
						</td>
						<td class="text-dark fw-medium custom-width"><?= $item['subkat']; ?></td>
						<td class="text-dark fw-medium custom-width"><?= $item['terjual']; ?></td>
						<td class="">
                            <a href="" class="btn btn-xs btn-warning ml-auto m-2 fw-bold"><i class="bx bx-edit"></i></a>
                            <a href=" <?= base_url('/catpen/produk/deleteProduk/') ?><?= $item['id_produk'] ?>" class="btn btn-xs btn-danger ml-auto m-2 fw-bold" onclick="return confirm('Ingin hapus barang ini?')"><i class="bx bx-trash"></i></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- new data modal -->
	<div class="modal fade" id="newDataModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<form action="<?= base_url('/catpen/produk/add') ?>" method="post" class="modal-content" enctype="multipart/form-data">
				<?= csrf_field() ?>
				<div class="modal-header">
					<h5 class="modal-title" id="backDropModalTitle">Tambah Produk</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row g-2">
						<div class="col mb-0">
							<label class="form-label">Foto Produk</label>
						    <div class="input-group">
                                <input type="file" name="img" accept="image/png, image/jpeg, image/jpg" class="form-control">
                                <img style="max-width: 100%; display:none;">
                            </div>
						</div>
						<div class="col mb-0">
							<label class="form-label">Nama Produk</label>
							<input type="text" id="Nama" name="Nama" class="form-control" placeholder="Nama Produk " required>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label class="form-label mt-3">Stok Produk</label>
							<input type="text" id="Stok" name="Stok" class="form-control" placeholder="Stok Produk" required>
						</div>
						<div class="col mb-0">
                            <label class="form-label mt-3">Harga Produk</label>
                            <input type="text" id="hrg" name="hrg" class="form-control" placeholder="Harga jual produk" required oninput="formatHarga(this)">
                        </div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label class="form-label mt-3">Subkategori Produk</label>
							<select class="form-select form-control" name="Subkat">
                                <?php foreach ($subcategories as $category) : ?>
                                    <option value="<?= $category['id_subkat'] ?>"><?= $category['subkat'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
						<div class="col mb-0">
							<label class="form-label mt-3">Keterangan Produk</label>
							<textarea id="Ket" name="Ket" class="form-control custom-hp" placeholder="Masukkan Keterangan Produk" required=""></textarea>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambahkan</button>
				</div>
			</form>
		</div>
	</div>
	
	<!-- Modal excel -->
	<div class="modal fade" id="modalexcel" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<form action="/items/uploadexcel" method="post" class="modal-content" enctype="multipart/form-data">
				<?= csrf_field() ?>
				<div class="modal-header">
					<h5 class="modal-title" id="backDropModalTitle">Tambahkan Produk dengan Excel</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col mb-3">
							<label class="form-label mt-3">File Excel</label>
							<input type="file" id="fileexcel" name="fileexcel" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambahkan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    function formatHarga(input) {
        let value = input.value.replace(/[^0-9]/g, ''); // Menghapus karakter selain angka
        if (value) {
            value = parseInt(value, 10).toLocaleString(); // Memformat angka dengan pemisah ribuan
        }
        input.value = value ? value : ''; // Menampilkan hasil format
    }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const productsBody = document.getElementById('products-body');
    const rows = productsBody.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.toLowerCase();

      for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let visible = false;

        for (let j = 0; j < cells.length; j++) {
          if (cells[j]) {
            if (cells[j].textContent.toLowerCase().includes(searchTerm)) {
              visible = true;
              break;
            }
          }
        }

        rows[i].style.display = visible ? '' : 'none';
      }
    });
  });
</script>
<?= $this->endSection(); ?>