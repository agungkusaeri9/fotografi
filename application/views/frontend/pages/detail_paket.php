<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-heading">
					<h2><?= $paket->packet_name ?></h2>
				</div>
				<div class="text-center">
					<img src="<?= base_url('assets/img/packets/') . $paket->first_image ?>" alt="line decoration" class="img-fluid" style="max-height:420px">
				</div>
				<div class="mt-5 text-center">
					<p class="">Kategori : <?= $paket->kategori_nama ?></p>
					<p class="">Harga : Rp <?= number_format($paket->packet_price, 0, ',', '.') . '/' . $paket->packet_duration ?></p>
					<p>
						<?= $paket->packet_description ?>
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="section-heading">
					<h5 class="text-center mb-5">Form Pemesanan</h5>
					<?php if ($this->session->userdata('name')) : ?>
						<form action="<?= base_url('customer/proses-booking') ?>" method="post" class="mt-5">
							<input type="text" name="id_packet" value="<?= $paket->id_packet ?>" hidden>
							<div class='form-group mb-3 text-left'>
								<label for='nama' class='mb-2 text-left'>Nama <span class='text-danger'>*</span></label>
								<input type='text' name='nama' class='form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>' value="<?= $this->session->userdata('name') ?>" disabled>
								<?php if (form_error('nama')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('nama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class='form-group mb-3 text-left'>
								<label for='email' class='mb-2'>Email <span class='text-danger'>*</span></label>
								<input type='text' name='email' class='form-control <?php if (form_error('email')) : ?> is-invalid <?php endif; ?>' value="<?= $this->session->userdata('email') ?>" disabled>
								<?php if (form_error('email')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('email') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class='form-group mb-3 text-left'>
								<label for='tanggal' class='mb-2'>Tanggal <span class='text-danger'>*</span></label>
								<input type='date' name='tanggal' class='form-control <?php if (form_error('tanggal')) : ?> is-invalid <?php endif; ?>'>
								<?php if (form_error('tanggal')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('tanggal') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class='form-group mb-3 text-left'>
								<label for='alamat' class='mb-2'>Alamat <span class='text-danger'>*</span></label>
								<textarea name='alamat' class='form-control <?php if (form_error('alamat')) : ?> is-invalid <?php endif; ?>' id='alamat' cols='10' rows='3'></textarea>
								<?php if (form_error('alamat')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('alamat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class='form-group mb-3 text-left'>
								<label for='jumlah_pembayaran' class='mb-2'>Jumlah Pembayaran <span class='text-danger'>*</span></label>
								<select name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control <?php if (form_error('alamat')) : ?> is-invalid <?php endif; ?>">
									<option value="">Pilih Jumlah Pembayaran</option>
									<option value="1">1 Kali</option>
									<option value="2">2 Kali</option>
								</select>
								<?php if (form_error('jumlah_pembayaran')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('jumlah_pembayaran') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block">Pesan Sekarang</button>
							</div>
						</form>
					<?php else : ?>
						<a href="<?= base_url('login') ?>" class="btn btn-primary">Login</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Testimonials Ends ***** -->