<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Tambah Kategori</h3>
			</div>

			<div class="card-body">
				<form action="<?= base_url('Kategori/proses_tambah') ?>" method="post">
					<div class='form-group mb-3'>
						<label for='nama' class='mb-2'>Nama</label>
						<input type='text' name='nama' class='form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('nama')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('nama') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>