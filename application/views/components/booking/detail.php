<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h3>Detail Booking</h3>
			</div>
			<div class="card-body">
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
					<li class="list-inline-item d-flex justify-content-between mb-2">
						<span>Aksi</span>
						<span class="font-weight-bold">
							<a href="<?= base_url('admin/booking') ?>" class="btn  btn-sm btn-warning">Kembali</a>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Transaksi Pembayaran</h3>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Keterangan</th>
							<th>Harga</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_transaksi as $transaksi) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $transaksi->keterangan ?></td>
								<td><?= format_rupiah($transaksi->total_harga) ?></td>
								<td><?= $transaksi->status_transaksi ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>