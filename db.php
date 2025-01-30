<?php 
$dsn = "mysql:dbname=test_db;host=localhost;charset=utf8";
$user = "root";
$pass = "root";

try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Ошибка подключения: " . $e->getMessage();
  exit();
}