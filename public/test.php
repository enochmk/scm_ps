<?php

require_once '../backend/core/init.php';

// $user = new User(507);
// if ($user->hasPermission('audit_vendor')) {
//   echo "granted";
// } else {
//   echo "denied";
// // }

// if(Session::exists('user_id')) {
//   $userID = Session::get('user_id');
//   $user = new User($userID);

//   if (!$user->hasPermission('audit_reports')) {
//     require_once './includes/errors/permission_denied.php';
//     exit();
//   }

//   require_once './includes/header.php';
//   require_once './includes/sidenav.php';

// } else {
//   header("Location: logout.php");
// }

$audits = new Audit();
$data = $audits->getAuditById(1);

$createAudit = array(
  "vendor_id" => 1,
  "procurement_category_id" => 1,
  "po_number" => 1,
  "createdBy" => 507,
  "username" => 'enoch.klufio',
);

$DB = DB::getInstance();

if ($DB->insert('tbl_audits', $createAudit)) {
  echo "Success";
} else {
  echo "Failed";
}

echo "<pre>";
// var_dump($data);
echo "</pre>";
