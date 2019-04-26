<?php
// get user id from session
$user = new User(1);
?>

<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark at-gray-bg" id="sidenav-main">
	<div class="container-fluid">
		<!-- Toggler -->
		<button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#sidenav-collapse-main"
			aria-controls="sidenav-main"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Brand -->
		<a class="navbar-brand pt-0" href="#">
			<!-- <img src="./assets/img/brand/airteltigo.png" class="navbar-brand-img" alt="..."> -->
			<?php require_once './includes/logo.php';?>
		</a>

		<!-- User -->
		<ul class="nav align-items-center d-md-none">
			<li class="nav-item dropdown">
				<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="media align-items-center">
						<span class="avatar avatar-sm rounded-circle">
							<img alt="Image placeholder" src="./assets/img/profile/avatar.jpg" />
						</span>
						<div class="media-body ml-2 d-none d-lg-block">
							<span class="mb-0 text-sm  font-weight-bold">Username</span>
						</div>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					<div class="dropdown-header noti-title">
						<h6 class="text-overflow m-0">Welcome!</h6>
					</div>
					<div class="dropdown-divider"></div>

					<?php if ($user->
  hasPermission('audit_reports')): ?>
					<a href="#!" class="dropdown-item">
						<i class="ni ni-user-run"></i>
						<span>Report</span>
					</a>
					<?php endif;?>

					<div class="dropdown-divider"></div>
					<a href="#!" class="dropdown-item">
						<i class="ni ni-user-run"></i>
						<span>Logout</span>
					</a>
				</div>
			</li>
		</ul>

		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="sidenav-collapse-main">
			<!-- Collapse header -->
			<div class="navbar-collapse-header d-md-none">
				<div class="row">
					<div class="col-6 collapse-brand">
						<a href="./index.html">
							<img src="./assets/img/brand/blue.png" />
						</a>
					</div>

					<div class="col-6 collapse-close">
						<button
							type="button"
							class="navbar-toggler"
							data-toggle="collapse"
							data-target="#sidenav-collapse-main"
							aria-controls="sidenav-main"
							aria-expanded="false"
							aria-label="Toggle sidenav"
						>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>

			<!-- Form -->
			<form class="mt-4 mb-3 d-md-none">
				<div class="input-group input-group-rounded input-group-merge">
					<input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search" />
					<div class="input-group-prepend">
						<div class="input-group-text">
							<span class="fa fa-search"></span>
						</div>
					</div>
				</div>
			</form>

			<!-- Navigation -->
			<ul class="navbar-nav">
				<?php if ($user->
  hasPermission('dashboard')): ?>
				<li class="nav-item">
					<a class="nav-link text-dark" href="./dashboard.php">
						<i class="ni ni-tv-2 text-danger"></i>
						Dashboard
					</a>
				</li>
				<?php endif;?>

				<?php if ($user->
  hasPermission('audit_vendor')): ?>
				<li class="nav-item">
					<a class="nav-link text-dark" href="./audit_vendor.php">
						<i class="ni ni-planet text-red"></i>
						Audit Vendor
					</a>
				</li>
				<?php endif;?>

				<?php if ($user->
  hasPermission('audit_reports')): ?>
				<li class="nav-item">
					<a class="nav-link text-dark" href="./audit_reports.php">
						<i class="ni ni-collection text-danger"></i>
						Reports
					</a>
				</li>
				<?php endif;?>
			</ul>

			<!-- Divider -->
			<hr class="my-3" />
		</div>
	</div>
</nav>
<!-- End SideNav -->
