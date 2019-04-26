<?php
require_once '../../core/api.php';

$_POST['user_id'] = 1;

if (Input::exists()) {
  $audit = new Audit();

  $userID = Input::get('user_id');

  $audit->setTable('tbl_vendor_lists');

  $data = $audit->getVendors($userID);

  echo json_encode($data);
}
