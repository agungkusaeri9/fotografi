<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Tambah Gambar</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('paketImage/proses_tambah') ?>" method="post" enctype="multipart/form-data">
					<input type="number" name="id_packet" value="<?= $id_packet ?>" hidden>
					<div class='form-group mb-3'>
						<label for='image_name' class='mb-2'>Gambar</label>
						<input type='file' name='image_name' class='form-control <?php if (form_error('image_name')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('image_name')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('image_name') ?>
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