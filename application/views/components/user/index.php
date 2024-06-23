<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header">
				<h3 class="mb-0">Datatable</h3>
				<p class="text-sm mb-0 mt-3">
					<a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-sm btn-primary">Tambah user</a>
				</p>
			</div>
			<div class="table-responsive py-4">
				<table class="table align-items-center table-flush" id="dtTable">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Np. HP</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data_user as $user) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $user->name ?></td>
								<td><?= $user->email ?></td>
								<td><?= $user->hp ?></td>
								<td>
									<?php if ($user->role_id == 1) : ?>
										Admin
									<?php else : ?>
										Customer
									<?php endif; ?>
								</td>
								<td>
									<a href="<?= base_url('admin/user/edit/')  . $user->id ?>" class="btn btn-sm btn-info">Edit</a>
									<form action="<?= base_url('admin/user/hapus/' . $user->id) ?>" method="post" class="d-inline" id="formDelete">
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