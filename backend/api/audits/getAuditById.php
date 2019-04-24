<?php
require_once '../../core/api.php';

if (Input::exists()) {

  $audits = new Audit();
  $data = $audits->getAuditById(Input::get('id'));

  echo json_encode($data);
}
