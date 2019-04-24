<?php
class DB
{
  private static $_instance = null;
  private $_pdo,
  $_query,
  $_error = false,
  $_results = array(),
  $_msg,
  $_count = 0;

  private function __construct()
  {
    try {
      $dsn = "mysql:host=" . Config::get('mysql/host') . ";dbname=" . Config::get('mysql/dbname');
      $username = Config::get('mysql/username');
      $password = Config::get('mysql/password');

      $this->_pdo = new PDO($dsn, $username, $password);
      // echo "Connected";
    } catch (PDOEXception $e) {
      die($e->getMessage());
    }
  }

  // return count from rows affected
  public function count()
  {
    return $this->_count;
  }

  // set Count value
  public function setCount($count)
  {
    $this->_count = $count;
  }

  // return result gotten from db query
  public function results()
  {
    return $this->_results;
  }

  // Set the result stored from db query
  public function setResults($results)
  {
    $this->_results = $results;
  }

  // return the current boolean value of the error state
  public function error()
  {
    return $this->_error;
  }

  // set the error state to a boolean value
  public function setError($bool)
  {
    $this->_error = $bool;
  }

  // Return the first value in the result array
  public function first()
  {
    return $this->results()[0];
  }

  // new db object not instantiated;
  public static function getInstance()
  {
    if (!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }

  // Generic SELECT statement query, with positional params
  public function query($sql, $params = array())
  {
    // Reset Error to false;
    $this->setError(false);
    $this->_query = $this->_pdo->prepare($sql);

    /* Bind param values  if any*/
    if ($this->_query) {
      $index = 1; // first positional ? question mark

      if (count($params)) {
        foreach ($params as $param) {
          $this->_query->bindValue($index, $param);
          $index++; // increate position ?
        }
      }

      /* Execute sql and return resultset */
      if ($this->_query->execute()) {
        $this->setCount($this->_query->rowCount());
        $this->setResults($this->_query->fetchAll(PDO::FETCH_OBJ));
      } else {
        $this->_error = true;
        $this->setResults(array());
      }
    }

    // Returns updated instance object;
    return $this;
  }

  // Works for 'SELECT *' and 'DELETE'
  private function action($action, $table, $where = array())
  {
    // $where array (column, operation, data)
    if (count($where) === 3) {
      // Define operators permitted
      $operators = array('=', '>', '<', '<=', '>=');

      $field = $where[0];
      $operator = $where[1];
      $value = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if (!$this->query($sql, array($value))->error()) {
          return $this; // Return the updated instance object
        }
      }
    }
    return false;
  }

  // DELETE statement with single WHERE clause: WHERE must be specified
  public function get($table, $where = array())
  {
    if ($where) {
      // return unique row
      return $this->action('SELECT *', $table, $where);
    } else {
      // return generic row
      return $this->query('SELECT * FROM ' . $table);
    }
  }

  // DELETE statement with single WHERE clause: WHERE must be specified
  public function delete($table, $where)
  {
    return $this->action('DELETE', $table, $where);
  }

  // Generic INSERTION method
  public function insert($table, $fields = array())
  {
    if (count($fields)) {
      $keys = array_keys($fields); //Extract keys from assoc array ie: username, password etc
      $values = " ";
      $x = 1;

      // Apend ? to string `values` add positional ?
      foreach ($fields as $field) {
        $values .= "?";

        if ($x < count($fields)) {
          $values .= ", "; // Append ','
        }

        $x++;
      }

      $sql = "INSERT INTO {$table} (`" . implode("`, `", $keys) . "`) VALUES ({$values})";
      // echo $sql;

      // Execute sql statement.
      if (!$this->query($sql, $fields)->error()) {
        return true; // No error, Insertion successful
      }
    }

    return false; // Error exists, insertion failed
  }

  // generic UPDATE statement
  public function update($table, $id, $fields = array())
  {
    $set = " ";
    $x = 1;

    foreach ($fields as $key => $field) {
      $set .= " {$key} = ? ";
      if ($x < count($fields)) {
        $set .= ", ";
      }
      $x++;
    }

    $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

    if (!$this->query($sql, $fields)->error()) {
      return true;
    }
    return false;
  }
}
