
<?php
class User extends Controller
{
  private $_sessionName;
  private $_permissions = null;
  private $_isLoggedIn = false;

  public function __construct($user = null)
  {
    parent::__construct();

    $this->_sessionName = Config::get('session/session_name');
    $this->setTable("tbl_users");

    if ($user) {
      if ($this->find($user)) {
        Session::put($this->_sessionName, $this->data()->id);
        $this->_isLoggedIn = true;
        return $this;
      };
    }
    return false;
  }

  public function isLoggedIn()
  {
    return $this->_isLoggedIn;
  }

  public function logout()
  {
    $this->_isLoggedIn = false;

    Session::delete($this->_sessionName);
  }

  public function permissions()
  {
    return $this->_permissions;
  }

  public function hasPermission($key)
  {
    if ($this->isLoggedIn()) {
      // admin, auditor, vendor
      $role = $this->conn()->get('tbl_user_roles', array('id', '=', $this->data()->role));

      if ($role->count()) {
        // permissions in JSON format decoded to assoc_array
        $permissions = json_decode($role->first()->permissions, true);

        // set permissions
        $this->_permissions = $permissions;

        //
        if ($permissions[$key] == true) {
          return true;
        }
      }
    }
    return false;
  }
}
