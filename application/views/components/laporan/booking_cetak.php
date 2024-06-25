<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Booking</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
			font-size: 12px;
		}

		.container {
			max-width: 800px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			text-align: center;
			margin-bottom: 20px;
			color: #333;
		}

		.table-container {
			overflow-x: auto;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		.table th,
		.table td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		.table th {
			background-color: #f2f2f2;
			color: #333;
		}

		.table tbody tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		.table tbody tr:hover {
			background-color: #e9ecef;
		}
	</style>
</head>

<body onload="window.print()">

	<div class="container">
		<h2>Laporan Booking</h2>
		<div class="table-container">
			<table class="table">
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
									<span class="badge badge-warning">Menunggu Pembayaran</span>
								<?php elseif ($booking->status_booking == 1) : ?>
									<span class="badge badge-primary">Terkonfirmasi</span>
								<?php elseif ($booking->status_booking == 2) : ?>
									<span class="badge badge-success">Selesai</span>
								<?php elseif ($booking->status_booking == 3) : ?>
									<span class="badge badge-danger">Dibatalkan</span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>