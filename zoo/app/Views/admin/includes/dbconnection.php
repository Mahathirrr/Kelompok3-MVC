<?php

use Libraries\Database;

$dbInstance = new Database();

$host = $dbInstance->getHost();
$user = $dbInstance->getUser();
$pass = $dbInstance->getPass();
$db = $dbInstance->getDb();

// Creating MySQLi connection using the obtained variables
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}
