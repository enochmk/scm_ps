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
}
