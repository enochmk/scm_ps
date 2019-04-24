<?php
class Utils {

  public static function get($tableName, $params = array()) {
    $conn = DB::getInstance();

    if($params) {
      $conn->get($tableName, $params);
      return (!$conn->error()) ? $conn->first() : array();
    } else {
      $conn->query("SELECT * FROM " . $tableName);
      return (!$conn->error()) ? $conn->results() : array();
    }
    
  }
}
