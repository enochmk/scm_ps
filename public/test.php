<?php

require_once '../backend/core/init.php';

$audit = new Audit();

$createAudit = array(
  "vendor" => 2,
  "procurement_category" => 1,
  "po_number" => 1,
  "quality_report_rating" => 1,
  "quality_installation_rating" => 1,
  "quality_post_rating" => 1,
  "delivery_goods_rating" => 1,
  "delivery_services_rating" => 1,
  "delivery_specification_rating" => 1,
  "innovation_rating" => 1,
  "expectations_rating" => 1,
  "competitive_rating" => 1,
  "communication_rating" => 1,
  "responsiveness_rating" => 1,
  "prevention_rating" => 1,
  "createdBy" => 2,
  "username" => "Louis_John_Smith",
);

// echo "Before creation <br>";
// if ($audit->create($createAudit)) {
//   echo "Successful";
// } else {
//   echo "failed";
// }
// echo "After creation <br>";

// echo "After deletion <br>";
// if ($audit->delete(2)) {
//   echo "deleted";

// } else {
//   echo "error";
// }

// $updateAudit = array(
//   "po_number" => 1,
//   "username" => "Louis_John_Smith",
// );

// if ($audit->update(1, $updateAudit)) {
//   echo "updated";
// } else {
//   echo "error";
// }

// var_dump($audit->get(array("id", "=", "2")));

// var_dump(Utils::get('param_vendors'));

// $allaudits = $audit->getAuditById(8);

// $allaudits = $audit->getVendors(1);
// // echo date_format('april', "m");

// echo "<pre>";
// var_dump($allaudits);
// echo "</pre>";

// echo "<pre>";
// var_dump($user->hasPermission('admin')->first()->permissions);
// echo "</pre>";

// $user = new User(2);
// if ($user->hasPermission('audit_vendor')) {
//   echo "granted";
// } else {
//   echo "denied";
// }

echo "<pre>";
var_dump($audit->allAudits());
echo "</pre>";
