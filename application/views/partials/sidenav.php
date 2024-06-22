<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
		<!-- Brand -->
		<div class="sidenav-header d-flex align-items-center">
			<a class="navbar-brand" href="<?= base_url() ?>pages/dashboards/dashboard.html">
				<img src="<?= base_url() ?>assets/img/brand/RPS2 Black.png" class="navbar-brand-img" alt="...">
			</a>
			<div class="ml-auto">
				<!-- Sidenav toggler -->
				<div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
					<div class="sidenav-toggler-inner">
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-inner">
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<!-- Nav items -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
							<i class="fas fa-tachometer-alt"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/kategori') ?>">
							<i class="fas fa-tags"></i>
							<span class="nav-link-text">Kategori Paket</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/paket') ?>">
							<i class="fas fa-box"></i>
							<span class="nav-link-text">Paket</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/jadwal') ?>">
							<i class="fas fa-calendar-alt"></i>
							<span class="nav-link-text">Jadwal</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/booking') ?>">
							<i class="fas fa-calendar-check"></i>
							<span class="nav-link-text">Booking</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/transaksi') ?>">
							<i class="fas fa-exchange-alt"></i>
							<span class="nav-link-text">Transaksi</span>
						</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<!-- Heading -->
				<!-- <h6 class="navbar-heading p-0 text-muted">Documentation</h6> -->
				<!-- Navigation -->
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<a class="nav-link <?= ($this->session->userdata('menu_active') == 'profile') ? 'active' : '' ?>" href="<?= site_url('admin/profile') ?>">
							<i class="ni ni-circle-08"></i>
							<span class="nav-link-text">Profile</span>
						</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
							<i class="ni ni-palette"></i>
							<span class="nav-link-text">Foundation</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
							<i class="ni ni-ui-04"></i>
							<span class="nav-link-text">Components</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
							<i class="ni ni-chart-pie-35"></i>
							<span class="nav-link-text">Plugins</span>
						</a>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
</nav>