<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Transaksi</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
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
		<h2>Laporan Transaksi</h2>
		<div class="table-container">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Kode</th>
						<th>Keterangan</th>
						<th>Total Harga</th>
						<th>Status Transaksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($data_transaksi as $transaksi) : ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= format_tanggal($transaksi->tanggal, 'd F Y') ?></td>
							<td><?= $transaksi->kode ?></td>
							<td><?= $transaksi->keterangan ?></td>
							<td><?= format_rupiah($transaksi->total_harga) ?></td>
							<td><?= $transaksi->status_transaksi ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>