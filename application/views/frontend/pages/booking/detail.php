<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="section-heading">
					<h2>Detail Booking</h2>
				</div>
				<ul class="list-inline">
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Kode Booking</span>
						<span class="font-weight-bold"><?= $booking->kode_booking ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Paket</span>
						<span class="font-weight-bold"><?= $booking->packet_name ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Nama Customer</span>
						<span class="font-weight-bold"><?= $booking->name ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Email</span>
						<span class="font-weight-bold"><?= $booking->email ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>No. HP</span>
						<span class="font-weight-bold"><?= $booking->hp ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Alamat</span>
						<span class="font-weight-bold"><?= $booking->alamat ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Total bayar</span>
						<span class="font-weight-bold"><?= format_rupiah($booking->total_bayar) ?></span>
					</li>
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Status</span>
						<span class="font-weight-bold">
							<?php if ($booking->status_booking == 0) : ?>
								<span class="badge badge-warning">Menunggu Konfirmasi</span>
							<?php elseif ($booking->status_booking == 1) : ?>
								<span class="badge badge-primary">Terkonfirmasi</span>
							<?php elseif ($booking->status_booking == 2) : ?>
								<span class="badge badge-success">Selesai</span>
							<?php elseif ($booking->status_booking == 3) : ?>
								<span class="badge badge-danger">Dibatalkan</span>
							<?php endif; ?>
						</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col">
				<div class="table-responsive">
					<table class="table nowrap table-hovertable-sm">
						<thead class="">
							<tr>
								<th>No</th>
								<th>Keterangan</th>
								<th>Harga</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($data_transaksi as $transaksi) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $transaksi->keterangan ?></td>
									<td>Rp <?= format_rupiah($transaksi->total_harga) ?></td>
									<td><?= $transaksi->status_transaksi ?></td>
									<td>
										<a href="<?= base_url('customer/booking/detail/')  . $booking->id_booking ?>" class="btn btn-sm btn-info">Bayar Sekarang</a>
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