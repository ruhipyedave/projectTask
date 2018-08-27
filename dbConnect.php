<?php 

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'project';

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}