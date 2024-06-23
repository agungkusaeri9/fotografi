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
								<th>Action</th>
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
										<?php endif; ?>
									</td>
									<td>
										<a href="<?= base_url('customer/booking/detail/')  . $booking->id_booking ?>" class="btn btn-sm btn-info">Detail Pembayaran</a>
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
<!-- ***** Testimonials Ends ***** -->