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
      <div class="container-fluid d-flex align-items-center justify-content-center text-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-red">Permission Denied!</h1>
						<h4 class="text-white mt-0 mb-5">Sorry, you do not have the permission to view this page. Please contact admin for further information.</h4>
            <p class="text-white">Thank you</p>
            <a href="http://portal.airteltigo.com.gh/index.php" class="btn btn-danger">Back TO AT25</a>
          </div>
        </div>
      </div>
   </div>
   <!-- Header -->

  <!-- page content -->
	<div class="container-fluid mt--7">

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