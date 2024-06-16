<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Edit Paket</h3>
			</div>

			<div class="card-body">
				<form action="<?= base_url('Paket/proses_update/' . $paket->id_packet) ?>" method="post">
					<div class='form-group mb-3'>
						<label for='packet_name' class='mb-2'>Nama Paket</label>
						<input type='text' name='packet_name' class='form-control <?php if (form_error('packet_name')) : ?> is-invalid <?php endif; ?>' value="<?= $paket->packet_name ?>">
						<?php if (form_error('packet_name')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('packet_name') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='id_kategori' class='mb-2'>Kategori</label>
						<select name='id_kategori' id='id_kategori' class='form-control <?php if (form_error('id_kategori')) : ?> is-invalid <?php endif; ?>'>
							<option value='' selected disabled>Pilih Kategori</option>
							<?php foreach ($data_kategori as $kategori) : ?>
								<option <?php if ($kategori->id_kategori == $paket->id_kategori) : ?> selected <?php endif; ?> value='<?= $kategori->id_kategori ?>'><?= $kategori->nama ?></option>
							<?php endforeach; ?>
						</select>
						<?php if (form_error('id_kategori')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('id_kategori') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='packet_duration' class='mb-2'>Durasi</label>
						<input type='text' name='packet_duration' class='form-control <?php if (form_error('packet_duration')) : ?> is-invalid <?php endif; ?>' value="<?= $paket->packet_duration ?>">
						<?php if (form_error('packet_duration')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('packet_duration') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='packet_price' class='mb-2'>Harga</label>
						<input type='text' name='packet_price' class='form-control <?php if (form_error('packet_price')) : ?> is-invalid <?php endif; ?>' value="<?= $paket->packet_price ?>">
						<?php if (form_error('packet_price')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('packet_price') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='packet_description' class='mb-2'>Deskripsi</label>
						<textarea name='packet_description' class='form-control <?php if (form_error('packet_description')) : ?> is-invalid <?php endif; ?>' id='packet_description' cols='10' rows='3'><?= $paket->packet_description ?></textarea>
						<?php if (form_error('packet_description')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('packet_description') ?>
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