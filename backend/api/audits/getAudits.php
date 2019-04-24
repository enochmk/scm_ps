<?php
require_once '../../core/api.php';

$audits = new Audit();
$data = $audits->allAudits();

echo json_encode($data);
