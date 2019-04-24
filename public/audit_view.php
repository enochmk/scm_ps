<?php
require_once '../backend/core/init.php';
require_once './includes/header.php';
require_once './includes/sidenav.php';?>

<div class="main-content">
   <!-- Top navbar -->
   <?php require_once './includes/top-navbar.php';?>
	 <!-- Top navbar -->

   <!-- Header -->
	 <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
	 style="min-height: 200px; max-height: 400px;  background-image: url(./assets/img/theme/airteltigo-wp.png); background-size: cover; background-position: center bottom;">
      <!-- Mask -->
      <span class="mask bg-gradient-dark opacity-8"></span>

      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row w-100">
          <div class="col-lg-10 col-md-10">
            <h1 class="display-2 text-white">Audit Details</h1>
						<p class="text-white mt-0 mb-5">Find audit details below </p>
          </div>
        </div>
      </div>
   </div>
   <!-- Header -->

  <!-- page content -->
	<div class="container-fluid mt--7">
		<div class="row justify-content-center">
			<div class="col-xl-9 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header at-gray-bg border-0">
						<div class="row align-items-center">
							<div class="col-12 d-flex justify-content-between">
								<h3 class="mb-0 text-dark">Audit Details</h3>
							</div>
						</div>
					</div>

					<div class="card-body">

					</div>
				</div>
			</div>
    </div>



		<!-- Footer -->
		<footer class="footer">
			<div class="row align-items-center justify-content-xl-between">
				<div class="col-xl-12">
					<div class="copyright text-center text-xl-right text-muted">
						&copy; 2018
						<a href="https://www.creative-tim.com" class="font-weight-bold ml-1">
							AirtelTigo Solutions Team
						</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
		<!-- end page content -->

<?php require_once './includes/footer.php';?>