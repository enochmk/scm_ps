<?php
require_once '../../core/api.php';

if (Input::exists()) {

  $createAudit = array(
    "vendor_id" => Input::get('input_vendor'),
    "procurement_category_id" => Input::get('input_category'),
    "po_number" => Input::get('input_po_number'),
    "quality_report_rating" => Input::get('quality_report_rating'),
    "quality_installation_rating" => Input::get('quality_installation_rating'),
    "quality_post_rating" => Input::get('quality_post_rating'),
    "quality_life_rating" => Input::get('quality_life_rating'),
    "delivery_goods_rating" => Input::get('delivery_goods_rating'),
    "delivery_services_rating" => Input::get('delivery_services_rating'),
    "delivery_specification_rating" => Input::get('delivery_specification_rating'),
    "innovation_rating" => Input::get('improvement_innovation_rating'),
    "expectations_rating" => Input::get('improvement_expectations_rating'),
    "competitive_rating" => Input::get('improvement_expectations_rating'),
    "communication_rating" => Input::get('feedback_customer_rating'),
    "responsiveness_rating" => Input::get('feedback__response_rating'),
    "prevention_rating" => Input::get('feedback__prevention_rating'),
    "createdBy" => 2,
    "username" => "Louis_John_Smith",
  );

  $audit = new Audit();
  if ($audit->create($createAudit)) {
    echo 1;
  } else {
    echo 0;
  }
}
