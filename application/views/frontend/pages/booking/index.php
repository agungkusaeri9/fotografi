<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2>Riwayat Booking</h2>
				</div>
				<div class="table-responsive">
					<table class="table nowrap table-hovertable-sm">
						<thead class="">
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Kode</th>
								<th>Alamat</th>
								<th>Jumlah Pembayaran</th>
								<th>Total Bayar</th>
								<th>Status</th>
								<th style="min-width: 230px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($data_booking as $booking) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= format_tanggal($booking->tanggal, 'd F Y H:i:s') ?></td>
									<td><?= $booking->kode_booking ?></td>
									<td><?= $booking->alamat ?></td>
									<td><?= $booking->jumlah_pembayaran . 'x' ?></td>
									<td>Rp <?= number_format($booking->total_bayar, 0, ',', '.') ?></td>
									<td>
										<?php if ($booking->status_booking == 0) : ?>
											<span class="badge badge-warning">Menunggu Pembayaran</span>
										<?php elseif ($booking->status_booking == 1) : ?>
											<span class="badge badge-primary">Terkonfirmasi</span>
										<?php elseif ($booking->status_booking == 2) : ?>
											<span class="badge badge-success">Selesai</span>
										<?php elseif ($booking->status_booking == 3) : ?>
											<span class="badge badge-danger">Dibatalkan</span>
										<?php elseif ($booking->status_booking == 4) : ?>
											<span class="badge badge-info">Menunggu Pelunasan</span>
										<?php endif; ?>
									</td>
									<td>

										<?php
										$rating = $this->rating->status($booking->id_booking);
										?>
										<?php if ($booking->status_booking == 2 && $rating == 0) : ?>
											<a href="javascript:void(0)" class="btn btn-sm btn-warning btnRating" data-id="<?= $booking->id_booking ?>">Beri Rating</a>
										<?php endif; ?>
										<a href="<?= base_url('customer/booking/detail/')  . $booking->id_booking ?>" class="btn btn-sm btn-info">Pembayaran</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Rating</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('customer/rating/store') ?>" method="post">
				<input type="hidden" name="id" id="form_id">
				<div class="modal-body">
					<div class='form-group mb-3'>
						<label for='nilai' class='mb-2'>Nilai <span class='text-danger'>*</span></label>
						<div class="star-rating">
							<input type="radio" id="1" name="nilai" value="1">
							<label for="1">&#9733;</label>
						</div>
						<div class="star-rating">
							<input type="radio" id="2" name="nilai" value="2">
							<label for="2">&#9733;</label>
							<label for="2">&#9733;</label>
						</div>
						<div class="star-rating">
							<input type="radio" id="3" name="nilai" value="3">
							<label for="3">&#9733;</label>
							<label for="3">&#9733;</label>
							<label for="3">&#9733;</label>
						</div>
						<div class="star-rating">
							<input type="radio" id="4" name="nilai" value="4">
							<label for="4">&#9733;</label>
							<label for="4">&#9733;</label>
							<label for="4">&#9733;</label>
							<label for="4">&#9733;</label>
						</div>
						<div class="star-rating">
							<input type="radio" id="5" name="nilai" value="5">
							<label for="5">&#9733;</label>
							<label for="5">&#9733;</label>
							<label for="5">&#9733;</label>
							<label for="5">&#9733;</label>
							<label for="5">&#9733;</label>
							<label for="5">&#9733;</label>
						</div>
						<?php if (form_error('nilai')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('nilai') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class='form-group mb-3'>
						<label for='keterangan' class='mb-2'>Keterangan</label>
						<textarea name='keterangan' class='form-control <?php if (form_error('keterangan')) : ?> is-invalid <?php endif; ?>' id='keterangan' cols='10' rows='3'></textarea>
						<?php if (form_error('keterangan')) : ?>
							<div class='invalid-feedback'>
								<?= form_error('keterangan') ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ***** Testimonials Ends ***** -->
<script>
	$(function() {
		$('body').on('click', '.btnRating', function() {
			let id = $(this).data('id');
			$('#form_id').val(id);
			$('#modalRating').modal('show');
		})
	})
</script>
<?php if ($this->session->flashdata('success')) : ?>
	<script>
		Swal.fire({
			position: 'center',
			icon: 'success',
			text: 'Berhasil!',
			title: '<?= $this->session->flashdata('success') ?>',
			showConfirmButton: true,
			timer: 2500
		})
	</script>
<?php endif; ?>