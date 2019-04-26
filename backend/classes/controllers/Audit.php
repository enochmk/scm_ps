<?php

class Audit extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTable("tbl_audits");
  }

  // SQL statement to pull all audits.
  public function allAudits($where = null)
  {
    $sql = "SELECT
              tbl_audits.id,
              vendor_name,
              category_name,
              po_number,
              quality_report_rating,
              quality_installation_rating,
              quality_post_rating,
              quality_life_rating,
              delivery_goods_rating,
              delivery_services_rating,
              delivery_specification_rating,
              innovation_rating,
              expectations_rating,
              competitive_rating,
              communication_rating,
              responsiveness_rating,
              prevention_rating,
              tbl_audits.createdBy,
              tbl_audits.username,
              tbl_audits.createdOn,
              tbl_audits.date
            FROM
              tbl_audits
            INNER JOIN param_vendors
              ON tbl_audits.vendor_Id = param_vendors.id
            INNER JOIN param_procurement_category
              ON tbl_audits.procurement_category_id = param_procurement_category.id";

    if (!$this->conn()->query($sql)->error()) {
      $this->setData($this->conn()->results());
      return $this->data();
    }

    return array();
  }

  public function getAuditById($id)
  {
    $sql = "SELECT
              tbl_audits.id,
              vendor_name,
              category_name,
              po_number,
              quality_report_rating,
              quality_installation_rating,
              quality_post_rating,
              quality_life_rating,
              delivery_goods_rating,
              delivery_services_rating,
              delivery_specification_rating,
              innovation_rating,
              expectations_rating,
              competitive_rating,
              communication_rating,
              responsiveness_rating,
              prevention_rating,
              tbl_audits.createdBy,
              tbl_audits.username,
              tbl_audits.createdOn,
              tbl_audits.date
            FROM
              tbl_audits
            INNER JOIN param_vendors
              ON tbl_audits.vendor_Id = param_vendors.id
            INNER JOIN param_procurement_category
              ON tbl_audits.procurement_category_id = param_procurement_category.id
            WHERE tbl_audits.id = $id";

    if (!$this->conn()->query($sql)->error()) {
      $this->setData($this->conn()->first());
      return $this->data();
    }

    return array();
  }

  public function getDates()
  {
    $sql = "SELECT distinct EXTRACT(MONTH from createdOn) AS month From tbl_audits";

    if (!$this->conn()->query($sql)->error()) {
      $this->setData($this->conn()->results());
      return $this->data();
    }

    return array();

  }

  public function reportByMonth($month)
  {
    $sql = "SELECT * FROM `tbl_audits` WHERE MONTH(createdOn) = " . $month . " AND YEAR(createdOn) = YEAR(CURRENT_TIME)";
  }

  public function getReports($from, $to)
  {
    $sql = "SELECT
              tbl_audits.id,
              vendor_name,
              category_name,
              po_number,
              quality_report_rating,
              quality_installation_rating,
              quality_post_rating,
              quality_life_rating,
              delivery_goods_rating,
              delivery_services_rating,
              delivery_specification_rating,
              innovation_rating,
              expectations_rating,
              competitive_rating,
              communication_rating,
              responsiveness_rating,
              prevention_rating,
              tbl_audits.createdBy,
              tbl_audits.username,
              tbl_audits.createdOn,
              tbl_audits.date
            FROM
              tbl_audits
            INNER JOIN param_vendors
              ON tbl_audits.vendor_Id = param_vendors.id
            INNER JOIN param_procurement_category
              ON tbl_audits.procurement_category_id = param_procurement_category.id
            WHERE tbl_audits.createdOn BETWEEN '" . $from . "' AND '" . $to . "'";

    if (!$this->conn()->query($sql)->error()) {
      $this->setData($this->conn()->results());
      return $this->data();
    }

    return array();

  }

  public function getVendors($userID)
  {
    $sql = "SELECT
            param_vendors.id AS id,
            param_vendors.vendor_name AS vendor_name
            FROM tbl_vendor_lists
            INNER JOIN param_vendors
            ON tbl_vendor_lists.vendor_id = param_vendors.id
            WHERE
            user_id = $userID";

    if (!$this->conn()->query($sql)->error()) {
      $this->setData($this->conn()->results());
      return $this->data();
    }

    return array();
  }
}
