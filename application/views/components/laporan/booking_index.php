<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Laporan Booking</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('admin/laporan/booking/print') ?>" method="get" target="_blank">
					<div class='form-group mb-3'>
						<label for='tanggal_awal' class='mb-2'>Tanggal Awal</label>
						<input type='date' name='tanggal_awal' class='form-control <?php if (form_error('tanggal_awal')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('tanggal_awal')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('tanggal_awal') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='tanggal_akhir' class='mb-2'>Tanggal Akhir</label>
						<input type='date' name='tanggal_akhir' class='form-control <?php if (form_error('tanggal_akhir')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('tanggal_akhir')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('tanggal_akhir') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group float-right mb-3'>
						<button class="btn btn-danger">Cetak</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>