<?php
session_start();
require_once 'functions/sanitize.php';

// Configuration settings.
$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => 'toor',
    'dbname' => 'scm',
  ),

  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800,
  ),

  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token',
  ),

  'app' => array(
    'title' => 'SCM',
    'version' => 'version 1',
  ),
);

// Auto Import Classes when needed.
spl_autoload_register(function ($class) {
  // class name
  $class .= ".php";

  // loop through class folders to require
  $folders = array(
    "controllers",
    "model",
    "utils",
  );

  $count = 1;
  foreach ($folders as $folder) {
    // echo "Looking into folder: " . $folder . "... <br>";
    $path = "../backend/classes/" . $folder . "/" . $class;
    if (file_exists($path)) {
      // echo "Class Found:  Loading complete <br>";
      require_once ($path);
      break 1;
    }
    $count++;
  }
});
