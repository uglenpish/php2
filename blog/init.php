<?php

session_start();

require_once 'function.php';

/**
 * @return PDO
 */
function getDbConnection(): PDO
{
  static $DB;
  if (!$DB) {
    try {
      $DB = new PDO('mysql:dbname=test1;host=127.0.0.1', 'root', 'root');
    } catch (Exception $e) {
      die('error: ' . $e->getMessage());
    }
  }

  return $DB;
}