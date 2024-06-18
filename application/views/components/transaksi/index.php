<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Transaksi</h3>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Kode Booking</th>
							<th>Paket</th>
							<th>Nama Customer</th>
							<th>No. Hp</th>
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
								<td><?= $transaksi->kode_booking ?></td>
								<td><?= $transaksi->packet_name ?></td>
								<td><?= $transaksi->name ?></td>
								<td><?= $transaksi->hp ?></td>
								<td><?= $transaksi->keterangan ?></td>
								<td>Rp <?= format_rupiah($transaksi->total_harga) ?></td>
								<td><?= $transaksi->status_transaksi ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>