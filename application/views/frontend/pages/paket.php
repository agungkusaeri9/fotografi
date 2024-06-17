<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>Professional <em>Photographers</em></h2>
					<img src="<?= base_url() ?>/assets/frontend/images/line-dec.png" alt="line decoration">
					<p>Our team of professional photographers is dedicated to capturing your special moments with precision and creativity. Whether it's a wedding, event, or portrait session, we bring our expertise and passion to every shot.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data_paket as $paket) : ?>
				<div class="col-lg-4">
					<a href="<?= base_url('paket/') . $paket->id_packet ?>">
						<div class="trainer-item">
							<div class="image-thumb">
								<?php if ($paket->first_image) : ?>
									<img src="<?= base_url('assets/img/packets/') . $paket->first_image ?>" alt="">
								<?php else : ?>
									<img src="<?= base_url() ?>/assets/frontend/images/first-trainer.jpg" alt="">
								<?php endif; ?>
							</div>
							<div class="down-content">
								<span><?= $paket->kategori_nama ?></span>
								<h4><?= $paket->packet_name ?></h4>
								<p>
									<?= $paket->packet_description ?>
								</p>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- ***** Testimonials Ends ***** -->