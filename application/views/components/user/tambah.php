<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Tambah User</h3>
			</div>

			<div class="card-body">
				<form action="<?= base_url('admin/user/proses_tambah') ?>" method="post">
					<div class='form-group mb-3'>
						<label for='name' class='mb-2'>Nama</label>
						<input type='text' name='name' class='form-control <?php if (form_error('name')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('name')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('name') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='hp' class='mb-2'>No. HP</label>
						<input type='text' name='hp' class='form-control <?php if (form_error('hp')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('hp')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('hp') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='email' class='mb-2'>Email</label>
						<input type='text' name='email' class='form-control <?php if (form_error('email')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('email')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('email') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='password' class='mb-2'>Password</label>
						<input type='password' name='password' class='form-control <?php if (form_error('password')) : ?> is-invalid <?php endif; ?>'>
						<?php if (form_error('password')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('password') ?>
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