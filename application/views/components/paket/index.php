<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Datatable</h3>
				<p class="text-sm mb-0 mt-3">
					<a href="<?= base_url('paket/tambah') ?>" class="btn btn-sm btn-primary">Tambah Paket</a>
				</p>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Nama Paket</th>
							<th>Kategori</th>
							<th>Durasi</th>
							<th>Harga</th>
							<th>Deskripsi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_paket as $paket) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $paket->packet_name ?></td>
								<td><?= $paket->kategori_nama ?? '-' ?></td>
								<td><?= $paket->packet_duration ?></td>
								<td><?= $paket->packet_price ?></td>
								<td><?= $paket->packet_description ?></td>
								<td>
									<a href="<?= base_url('paketimage')  . '?id_packet=' . $paket->id_packet ?>" class="btn btn-sm btn-warning">Gambar</a>
									<a href="<?= base_url('paket/edit/')  . $paket->id_packet ?>" class="btn btn-sm btn-info">Edit</a>
									<form action="<?= base_url('paket/hapus/' . $paket->id_packet) ?>" method="post" class="d-inline" id="formDelete">
										<button class="btn btnDelete btn-sm btn-danger">Hapus</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>