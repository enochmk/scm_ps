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
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Audits Reports</h1>
						<p class="text-white mt-0 mb-5">You can download report on previous audits that were performed here. </p>
						<a href="#" class="btn btn-success">Download Report</a>
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
								<h3 class="mb-0 text-dark">Previous Audits</h3>
							</div>
						</div>
					</div>

					<div class="card-body" id="audits_card">
            <div class="table-responsiveness">
              <table class="table table-striped table-hover aligns-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Category of Procurement</th>
                    <th scope="col">PO Number</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody id="audits_table">
                </tbody>
              </table>
            </div>
					</div>

					 <!-- The Modal -->
					<div class="modal" id="viewModal" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header text-center">
									<h4 class="modal-title">Audit Details</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Modal body -->
								<div class="modal-body">
									<div class="row mb-3">
										<div class="col text-left">
											Vendor
										</div>
										<div class="col text-right">
											<span id="vendor_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Cateogory of Procurement
										</div>
										<div class="col text-right">
											<span id="category_label"></span>
										</div>
									</div>


									<div class="row mb-3">
										<div class="col text-left">
										PO Number
										</div>
										<div class="col text-right">
											<span id="po_number_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Quality Of Report
										</div>
										<div class="col text-right">
											<span id="quality_of_report_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Quality Of Installation
										</div>
										<div class="col text-right">
											<span id="quality_of_installation_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Quality Of Post
										</div>
										<div class="col text-right">
											<span id="quality_of_post_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Quality Of life
										</div>
										<div class="col text-right">
											<span id="quality_of_life_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Delivery Of Goods
										</div>
										<div class="col text-right">
											<span id="delivery_of_goods_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Delivery Of Services
										</div>
										<div class="col text-right">
											<span id="delivery_of_services_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Delivery Of Specification
										</div>
										<div class="col text-right">
											<span id="delivery_of_specifications_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Innovation
										</div>
										<div class="col text-right">
											<span id="innovation_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Expectations
										</div>
										<div class="col text-right">
											<span id="expectations_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											Competitive rating
										</div>
										<div class="col text-right">
											<span id="competitive_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											communication rating
										</div>
										<div class="col text-right">
											<span id="communication_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											responsiveness rating
										</div>
										<div class="col text-right">
											<span id="responsiveness_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											prevention rating
										</div>
										<div class="col text-right">
											<span id="prevention_label"></span>
										</div>
									</div>

									<div class="row mb-3">
										<div class="col text-left">
											CreatedBy
										</div>
										<div class="col text-right">
											<span id="createdBy_label"></span>
										</div>
									</div>
								</div>

								<hr class="my-4">
								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>

							</div>
						</div>
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