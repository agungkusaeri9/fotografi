<header class="header-area header-sticky">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="main-nav" <?php if ($judul !== 'Home') : ?> style="background-color: red;" <?php endif; ?>>
					<!-- ***** Logo Start ***** -->
					<a href="<?= base_url('/') ?>" class="logo ml-4">Royalposh<em> Story</em></a>
					<!-- ***** Logo End ***** -->
					<!-- ***** Menu Start ***** -->
					<ul class="nav">
						<li class="scroll-to-section"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="scroll-to-section"><a href="<?= base_url('about') ?>">About</a></li>
						<li class="scroll-to-section"><a href="<?= base_url('contact') ?>">Contact</a></li>
						<li class="scroll-to-section"><a href="<?= base_url('paket') ?>">Paket</a></li>
						<?php if ($this->session->userdata('id')) : ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
									<?= $this->session->userdata('name') ?></a>
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?= base_url('customer/booking') ?>">Riwayat Booking</a>
									<a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
								</div>
							</li>
						<?php else : ?>
							<li class="main-button"><a href="<?= base_url('login') ?>">Login</a></li>
						<?php endif; ?>
					</ul>
					<a class='menu-trigger'>
						<span>Menu</span>
					</a>
					<!-- ***** Menu End ***** -->
				</nav>
			</div>
		</div>
	</div>
</header>