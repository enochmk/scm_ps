<?php
require_once '../../core/api.php';

if (Input::exists()) {

  $from = Input::get('from_date');
  $to = Input::get('to_date');

  $audit = new Audit();
  $data = $audit->getReports($from, $to);

  var_dump($data);

  return;

  $filename = 'report.xls';
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=' . $filename);

}
