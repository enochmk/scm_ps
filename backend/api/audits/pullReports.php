<?php
require_once '../../core/api.php';

$response = array(
  "success" => 0,
  "msg" => "",
);

if (Input::exists()) {
  $from = Input::get('from_date');
  $to = Input::get('to_date');

  if (isset($from) && !empty($from) && isset($to) && !empty($to)) {
    if (true) {
      // $filename = 'report.xls';
      // header('Content-type: application/xls');
      // header('Content-Disposition: attachment; filename=' . $filename);

      $response['msg'] = "Downloading...";
      $response['success'] = 1;

      $audit = new Audit();
      $data = $audit->getReports($from, $to);

      echo json_encode($data);
      ?>

      <table>
        <tr>
          <th>Vendor Name</th>
          <th>Category Name</th>
          <th>PO Number</th>
          <th>Quality of life</th>
          <th>Quality of post</th>
          <th>Quality of installation</th>
          <th>Quality of report</th>
          <th>Quality of goods</th>
          <th>Quality of services</th>
          <th>Quality of specification</th>
          <th>Communication</th>
          <th>Competitive</th>
          <th>Innovation</th>
          <th>Prevention</th>
          <th>Responsiveness</th>
          <th>Username</th>
          <th>CreatedOn</th>
        </tr>

        <?php foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row['vendor_name'] ?></td>
          <td><?php echo $row['category_name'] ?></td>
          <td><?php echo $row['po_number'] ?></td>
          <td><?php echo $row['quality_life_rating'] ?></td>
          <td><?php echo $row['quality_post_rating'] ?></td>
          <td><?php echo $row['quality_installation_rating'] ?></td>
          <td><?php echo $row['quality_report_rating'] ?></td>
          <td><?php echo $row['delivery_goods_rating'] ?></td>
          <td><?php echo $row['delivery_services_rating'] ?></td>
          <td><?php echo $row['delivery_specification_rating'] ?></td>
          <td><?php echo $row['communication_rating'] ?></td>
          <td><?php echo $row['competitive_rating'] ?></td>
          <td><?php echo $row['innovation_rating'] ?></td>
          <td><?php echo $row['prevention_rating'] ?></td>
          <td><?php echo $row['responsiveness_rating'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['createdOn'] ?></td>
        </tr>
        <?php endforeach;?>
      </table>

      <?php
} else {
      $response['success'] = 0;
      $response['msg'] = "Error: Invalid specified dates";
      echo "invalid input";
    }
  } else {
    $response['success'] = 0;
    $response['msg'] = "Please specify the date range";
    echo "No data";
  }
}

// echo json_encode($response);
