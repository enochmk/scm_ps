<?php
class Session {
  public static function put($name, $value) {
    return $_SESSION[$name] = $value;
  }

   public static function exists($name) {
    return (isset($_SESSION[$name]) ? true : false);
  }

  public static function delete($name) {
    if(self::exists($name)) {
      unset($_SESSION[$name]);
    }
  }

  public static function get($name) {
    return $_SESSION[$name];
  } 

  public static function flash($index, $value = '') {
    if(self::exists($index)) {
      $session = self::get($index);
      self::delete($index);
      return $session;
    } else {
      self::put($index, $value);
    }

    return "";
  }
}
