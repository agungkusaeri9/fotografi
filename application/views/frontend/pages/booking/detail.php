<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $this->config->item('midtrans_client_key'); ?>"></script>
<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="section-heading">
					<h2>Detail Booking</h2>
				</div>
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
								<span class="badge badge-warning">Menunggu Pembayaran</span>
							<?php elseif ($booking->status_booking == 1) : ?>
								<span class="badge badge-primary">Terkonfirmasi</span>
							<?php elseif ($booking->status_booking == 2) : ?>
								<span class="badge badge-success">Selesai</span>
							<?php elseif ($booking->status_booking == 3) : ?>
								<span class="badge badge-danger">Dibatalkan</span>
							<?php endif; ?>
						</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col">
				<div class="table-responsive">
					<table class="table nowrap table-hovertable-sm">
						<thead class="">
							<tr>
								<th>No</th>
								<th>Keterangan</th>
								<th>Harga</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($data_transaksi as $transaksi) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $transaksi->keterangan ?></td>
									<td><?= format_rupiah($transaksi->total_harga) ?></td>
									<td>
										<?php if ($transaksi->status_transaksi === 'settlement') : ?>
											Lunas
										<?php else : ?>
											<?= $transaksi->status_transaksi ?>
										<?php endif; ?>
									</td>
									<td>
										<?php if ($transaksi->status_transaksi === 'Menunggu Pembayaran') : ?>
											<a href="javascript:void(0)" data-id="<?= $transaksi->id_transaction ?>" data-snaptoken="<?= $transaksi->snap_token ?>" class="btn btn-sm btn-info btnBayar">Bayar Sekarang</a>
										<?php else : ?>
											<a href="javascript:void(0)" class="btn btn-sm btn-info disabled" disabled>Bayar Sekarang</a>
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
</section>
<!-- ***** Testimonials Ends ***** -->
<script type="text/javascript">
	$('body').on('click', '.btnBayar', function(event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");

		let snaptoken = $(this).data('snaptoken');
		let id = $(this).data('id');
		if (snaptoken) {
			snap.pay(snaptoken, {
				onSuccess: function(result) {
					changeResult('success', result);
					console.log(result.status_message);
					console.log(result);
				},
				onPending: function(result) {
					changeResult('pending', result);
					console.log(result.status_message);
					console.log(result);
				},
				onError: function(result) {
					changeResult('error', result);
					console.log(result.status_message);
					console.log(result);
				}
			});
		} else {
			$.ajax({
				url: '<?php echo base_url('customer/booking/token'); ?>',
				data: {
					id
				},
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					snap.pay(data.snaptoken, {
						onSuccess: function(result) {
							changeResult('success', result);
							console.log(result.status_message);
							console.log(result);
						},
						onPending: function(result) {
							changeResult('pending', result);
							console.log(result.status_message);
							console.log(result);
						},
						onError: function(result) {
							changeResult('error', result);
							console.log(result.status_message);
							console.log(result);
						}
					});
				}
			});
		}
	});
</script>