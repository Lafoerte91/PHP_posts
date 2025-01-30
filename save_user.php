<?php
require './db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $stmt = $pdo->prepare("INSERT INTO users(username) values(:username)");
  $stmt->execute(['username' => $username]);
  echo "Пользователь $username сохранен<br>";
  echo '<a href="list_users.php">Список пользователей</a>';
} else {
  echo "Отправьте методом POST";
}