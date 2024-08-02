<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Jadwal</h3>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Tanggal Booking</th>
							<th>Kode Booking</th>
							<th>Nama Customer</th>
							<th>No. HP</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_jadwal as $booking) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= format_tanggal($booking->tanggal, 'd F Y H:i:s') ?></td>
								<td><?= $booking->kode_booking ?></td>
								<td><?= $booking->name ?></td>
								<td><?= $booking->hp ?></td>
								<td><?= $booking->alamat ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>