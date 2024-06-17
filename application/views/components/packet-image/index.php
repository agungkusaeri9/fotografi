<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Datatable</h3>
				<p class="text-sm mb-0 mt-3">
					<a href="<?= base_url('paketImage/tambah') . '?id_packet=' . $id_packet ?>" class="btn btn-sm btn-primary">Tambah Gambar</a>
				</p>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_packet_images as $packet_image) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td>
									<img src="<?= base_url('assets/img/packets/') . $packet_image->image_name ?>" class="img-fluid" alt="" style="max-height:80px">
								</td>
								<td>
									<form action="<?= base_url('paketImage/hapus/' . $packet_image->id_packet_images) ?>" method="post" class="d-inline" id="formDelete">
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