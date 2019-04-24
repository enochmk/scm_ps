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
	style="min-height: 200px; max-height: 400px;  background-image: url(./assets/img/theme/airteltigo-wp.png); background-size:cover; background-position: center bottom;">
      <!-- Mask -->
      <span class="mask bg-gradient-dark opacity-8"></span>

      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Evaluate Vendor</h1>
						<p class="text-white mt-0 mb-5">Please complete the form below to evaluate respective vendor.</p>
						<!-- <!-- <a href="#" class="btn btn-success">Download Report</a> --> -->
          </div>
        </div>
      </div>
  </div>
	<!-- Header -->

  <!-- page content -->
	<div class="container-fluid mt--7">
		<div class="row justify-content-center">
			<div class="col-xl-8 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header at-gray-bg border-0">
						<div class="row align-items-center">
							<div class="col-12 d-flex justify-content-between">
								<h3 class="mb-0 text-dark">Audit Vendor</h3>
							</div>
						</div>
					</div>

					<div class="card-body">
						<form method="POST" id="addAudit">
							<div id="vendor_info">
								<h6 class="heading-small text-muted mb-4">
									Vendor information
								</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-vendor">
													Vendor
												</label>
												<?php $vendors = Utils::get('param_vendors');?>
												<select name="input_vendor" id="input_vendor" class="form-control" required>
													<?php foreach ($vendors as $vendor): ?>
														<option value="<?php echo $vendor->id ?>"> <?php echo $vendor->vendor_name; ?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-category">
													Category Of Procurement
												</label>
													<?php $procurements = Utils::get('param_procurement_category');?>
												<select name="input_category" id="input_category" class="form-control" required>
													<option value='0'>Select a category... </option>
													<?php foreach ($procurements as $procurement): ?>
														<option value="<?php echo $procurement->id ?>"> <?php echo $procurement->category_name; ?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input_po_number">
													Job/Project Being Evaluated on ( PO Number )
												</label>
												<input type="text" id="input_po_number" name="input_po_number" class="form-control form-control-alternativse" placeholder="eg: 7845212365" required/>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
							</div>

							<div id="quality_ratings">
								<h6 class="heading-small text-muted mb-4">
									Quality(30%)
								</h6>
								<div class="pl-lg-4">
									<div class="row qt goods turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_report_rating">
													Item Status at Receipt, Condition Report
												</label>
												<div id="input_report_rating"></div>
												<input
													type="hidden"
													id="quality_report_rating"
													name="quality_report_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>
									<div class="row qt services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_installation_rating">
													Quality Status during installation/reworks
												</label>
												<div id="input_installation_rating"></div>
												<input
													type="hidden"
													id="quality_installation_rating"
													name="quality_installation_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>
									<div class="row qt services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_post_rating">
													Quality status post Installation
												</label>
												<div id="input_post_rating"></div>
												<input
													type="hidden"
													id="quality_post_rating"
													name="quality_post_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>

									</div>
									<div class="row qt goods services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_life_rating">
														Life of item, product or service / Meet warranty
												</label>
												<div id="input_life_rating"></div>
												<input
													type="hidden"
													id="quality_life_rating"
													name="quality_life_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>

								</div>
								<hr class="my-4" />
							</div>

							<div id="delivery_ratings">
								<h6 class="heading-small text-muted mb-4">
									Delivery(25%)
								</h6>
								<div class="pl-lg-4">
									<div class="row qt goods turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_d_goods_rating">
													Adherence to agreed delivery timelines against the released schedules / PO’s (Goods)
												</label>
												<div id="input_d_goods_rating"></div>
												<input
													type="hidden"
													id="delivery_goods_rating"
													name="delivery_goods_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>

									<div class="row qt services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_d_services_rating">
													Adherence to agreed delivery timelines against the released schedules / PO’s (Services)
												</label>
												<div id="input_d_services_rating"></div>
												<input
													type="hidden"
													id="delivery_services_rating"
													name="delivery_services_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>


									<div class="row qt goods services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_specification_rating">
													Adherence to agreed specification
												</label>
												<div id="input_specification_rating"></div>
												<input
													type="hidden"
													id="delivery_specification_rating"
													name="delivery_specification_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
							</div>

							<!-- Continuous Improvement -->
							<div id="continuous_improvement_ratings">
								<h6 class="heading-small text-muted mb-4">
									Continuous Improvement - Development / Innovation / New Technology (20%)
								</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_innovation_rating">
														Innovation and New Technology
												</label>
												<div id="input_innovation_rating"></div>
												<input
													type="hidden"
													id="improvement_innovation_rating"
													name="improvement_innovation_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_expectations_rating">
													Exceeding expectations
												</label>
												<div id="input_expectations_rating"></div>
												<input
													type="hidden"
													id="improvement_expectations_rating"
													name="improvement_expectations_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_competitive_rating">
													Competitive Advantage (Best market prices offer for the technology)
												</label>
												<div id="input_competitive_rating"></div>
												<input
													type="hidden"
													id="improvement_competitive_rating"
													name="improvement_expectations_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
							</div>

							<div id="responsiveness_ratings">
								<h6 class="heading-small text-muted mb-4">
										Responsiveness / Feedback (25%)
								</h6>
								<div class="pl-lg-4">
									<div class="row qt goods services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_customer_rating">
													Customer oriented communication
												</label>
												<div id="input_customer_rating"></div>
												<input
													type="hidden"
													id="feedback_customer_rating"
													name="feedback_customer_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>

									<div class="row qt goods services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_reponse_rating">
													Responsiveness (Response for meeting challenges, speed of response and flexibility)
												</label>
												<div id="input_response_rating"></div>
												<input
													type="hidden"
													id="feedback__response_rating"
													name="feedback__response_rating"
													class="form-control form-control-alternative"
													value="-"
													required
												/>
											</div>
										</div>
									</div>


									<div class="row qt services turnkey">
										<div class="col-md-12">
											<div class="form-group star-rate">
												<label class="form-control-label" for="input_prevention_rating">
													Issue Resolution and Prevention
												</label>
												<div id="input_prevention_rating"></div>
												<input type="hidden"	id="feedback__prevention_rating" name="feedback__prevention_rating"	class="form-control form-control-alternative" value="-"	required
												/>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
							</div>

							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</form>

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
						<a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">
							Solutions Team
						</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
		<!-- end page content -->

<?php require_once './includes/footer.php';?>