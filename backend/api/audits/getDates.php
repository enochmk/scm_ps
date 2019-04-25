<?php
require_once '../../core/api.php';

$audits = new Audit();
$data = $audits->getDates();

echo json_encode($data);
