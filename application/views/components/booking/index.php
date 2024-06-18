<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Datatable</h3>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Tanggal Booking</th>
							<th>Kode Booking</th>
							<th>Nama Customer</th>
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
								<td><?= format_tanggal($booking->tanggal_booking) ?></td>
								<td><?= $booking->kode_booking ?></td>
								<td><?= $booking->name ?></td>
								<td><?= $booking->alamat ?></td>
								<td><?= $booking->jumlah_pembayaran . 'x' ?></td>
								<td>Rp <?= number_format($booking->total_bayar, 0, ',', '.') ?></td>
								<td>
									<?php if ($booking->status_booking == 0) : ?>
										<span class="badge badge-warning">Menunggu Konfirmasi</span>
									<?php elseif ($booking->status_booking == 1) : ?>
										<span class="badge badge-primary">Terkonfirmasi</span>
									<?php elseif ($booking->status_booking == 2) : ?>
										<span class="badge badge-success">Selesai</span>
									<?php elseif ($booking->status_booking == 3) : ?>
										<span class="badge badge-danger">Dibatalkan</span>
									<?php endif; ?>
								</td>
								<td>
									<a href="<?= base_url('admin/booking/detail/')  . $booking->id_booking ?>" class="btn btn-sm btn-info">Detail</a>
									<?php if ($booking->status_booking == 0 || $booking->status_booking == 3) : ?>
										<form action="<?= base_url('admin/booking/hapus/' . $booking->id_booking) ?>" method="post" class="d-inline" id="formDelete">
											<button class="btn btnDelete btn-sm btn-danger">Hapus</button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>