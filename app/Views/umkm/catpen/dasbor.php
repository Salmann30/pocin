<?= $this->extend('templates/catpen/index'); ?>
<?= $this->section('page-Content'); ?>
<!-- Begin Page Content -->
<link rel="stylesheet" href="<?= base_url('catpen/css/dashboard.css'); ?>">
<style>

</style>
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
	    <div class="col-lg-8 col-12 col-md-8">
	        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
    			<div class="card">
    	        <p class="mb-2 m-2 text-dark text-end">
    					Kamu mendapat <span class="fw-bold">Rp0.</span> hari ini. Tingkatkan ambisi mu.
    		    </p>
    				<div class="d-flex align-items-end row">
    					<div class="col-sm-8">
    						<div class="card-body">
    							<div class="tab-content p-0">
    								<div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
    									<div id="incomeChart"></div>
    								</div>
    	    					</div>
    						</div>
    					</div>
    					<div class="col-sm-4 text-center text-sm-left">
    						<div class="card-body pb-0 px-0 px-md-4">
    							<img src="<?= base_url('/catpen/img/illustrations/man-with-laptop-light.png'); ?>" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
    						</div>
    					</div>
    				</div>
    			</div>
			</div>
			<div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4 mt-4">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5 class="text-dark fw-medium text-nowrap mb-2">Produk Terlaris</h5>
							<div class="col-12 col-sm-12 col-lg-12 order-sm-6">
								<div class="table-responsive text-dark text-nowrap">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Produk</th>
												<th>Total Penjualan</th>
											</tr>
										</thead>
										<tbody class="table-border-bottom-0">
											<?php $i = 1; ?>
											
											<tr>
												<th scope="row" class="text-center"><?= $i++; ?></th>
												<td>Nama_Barang</td>
												<td>0</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	    <div class="col-lg-4 col-12 col-md-4">
	        <div class="row">
	            <div class="col-6">
                    <div class="card">
        				<div class="card-body">
        					<div class="card-title d-flex align-items-start justify-content-between">
        						<div class="avatar flex-shrink-0">
        							<img src="<?= base_url('/catpen/img/icons/unicons/chart-success.png'); ?>" alt="chart success" class="rounded" />
        						</div>
        					</div>
        					<span class="text-dark fw-medium d-block mb-1">Total Keuntungan</span>
        					<h6 class="card-title mb-2"> Rp0.</h6>
        				</div>
    				</div>    
                </div>
                <div class="col-6">
                    <div class="card">
						<div class="card-body">
							<div class="card-title d-flex align-items-start justify-content-between">
								<div class="avatar flex-shrink-0">
									<img src="<?= base_url('/catpen/img/icons/unicons/wallet-info.png'); ?>" alt="Credit Card" class="rounded" />
								</div>
							</div>
							<span class="text-dark fw-medium d-block mb-1">Total Pendapatan</span>
							<h6 class="card-title mb-2"> Rp0.</h6>
						</div>
					</div>
                </div>
	        </div>
	        <div class="row mt-4">
	            <div class="col-6">
	                <div class="card">
						<div class="card-body">
							<div class="card-title d-flex align-items-start justify-content-between">
								<div class="avatar flex-shrink-0">
									<img src="<?= base_url('/catpen/img/icons/unicons/paypal.png'); ?>" alt="Credit Card" class="rounded" />
								</div>
							</div>
							<span class="text-dark fw-medium d-block mb-1">Pengeluaran</span>
							<h6 class="card-title text-nowrap mb-2"> Rp0.</h6>
						</div>
					</div>
	            </div>
	            <div class="col-6">
	                <div class="card">
						<div class="card-body">
							<div class="card-title d-flex align-items-start justify-content-between">
								<div class="avatar flex-shrink-0">
									<img src="<?= base_url('/catpen/img/icons/unicons/cc-primary.png'); ?>" alt="Credit Card" class="rounded" />
								</div>
							</div>
							<span class="text-dark fw-medium d-block mb-1">Total Transaksi</span>
							<h6 class="card-title mb-2">0</h6>
						</div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<script>
    window.chartData = <?php echo json_encode($data); ?>; // Mendeklarasikan data global
</script>
<script src="<?= base_url('/catpen/js/grafik.js')?>"></script>
<?= $this->endSection(); ?>