<?php
class Hash {
  public static function make($string, $salt = '') {
    return hash('sha256', $string . $salt);
  }

  public static function salt($length) {
    return random_bytes ($length); //mcrypt_create_iv is depracated. This is the alternative method to use
  }

  public static function unique() {
    return self::make(uniqid());
  }
}
