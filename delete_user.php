<?php
require './db.php';

$user_id = $_GET['user_id'] ?? 0;
$stmt = $pdo->prepare("DELETE FROM users where id=:user_id");
$stmt->execute(['user_id' => $user_id]);
echo "Пользователь удален!<br>";
?>
  <a href="list_users.php">Вернуться к списку пользователей</a>