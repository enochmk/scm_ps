<?php
class Controller
{
  private $_db = null;
  private $_data = array();
  private $_tableName = '';

  public function __construct($tbl_name = null)
  {
    $this->_db = DB::getInstance();

    if ($tbl_name) {
      $this->_tableName = $tbl_name;
    }
  }

  // Return table
  public function table()
  {
    return $this->_tableName;
  }

  // set data db
  public function setTable($name)
  {
    $this->_tableName = $name;
  }

  // Return data
  public function data()
  {
    return $this->_data;
  }

  // set Data
  public function setData($data)
  {
    $this->_data = $data;
  }

  // Check data stored not empty.
  public function exists()
  {
    return (!empty($this->_data)) ? true : false;
  }

  // Return connection to DB
  public function conn()
  {
    return $this->_db;
  }

  // Method to check if a agent exists or not. Query by ID
  public function find($row_id = null)
  {
    if ($row_id && (is_numeric($row_id)) && $this->table()) {
      $data = $this->conn()->get($this->table(), array('id', '=', $row_id));

      if (!$data->error()) {
        if ($data->count()) {
          $this->setData($data->first());
          return $this;
        }
      }
    }
    return false;
  }

  /*
   *             CRUD OPERATION
   */

  // Method to create new agent. key in the array must match the column; "firstName" => "John"
  public function create($fields = array())
  {
    if (!$this->conn()->insert($this->table(), $fields)) {
      throw new Exception('There was a problem creating');
      return false;
    }
    return true;
  }

  // Where must be array : ('id', '=' '3')
  public function get($where = array())
  {
    if (!$this->conn()->get($this->table(), $where)->error()) {
      $this->setData($this->conn()->results());
      return $this->data();
    }

    return array();
  }

  // Update account: array should be like assoc_arr ('first_name' => 'John')
  public function update($id = null, $fields = array())
  {
    if ($id) {
      if ($this->conn()->update($this->table(), $id, $fields)) {
        return true;
      }
      throw new Exception("There was a problem updating");
    }
    return false;
  }

  // Delete account: specify row id to delete from respective tableName
  public function delete($id = null)
  {
    if ($id && is_numeric($id)) {
      $where = array(
        "id", "=", $id,
      );
      if ($this->conn()->delete($this->_tableName, $where)->error()) {
        throw new Exception("There was a problem deleting");
      }
      return true;
    }
    return false;
  }

}
