<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Datatable</h3>
				<p class="text-sm mb-0 mt-3">
					<a href="<?= base_url('kategori/tambah') ?>" class="btn btn-sm btn-primary">Tambah Kategori</a>
				</p>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_kategori as $kategori) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $kategori->nama ?></td>
								<td>
									<a href="<?= base_url('kategori/edit/')  . $kategori->id_kategori ?>" class="btn btn-sm btn-info">Edit</a>
									<form action="<?= base_url('kategori/hapus/' . $kategori->id_kategori) ?>" method="post" class="d-inline" id="formDelete">
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