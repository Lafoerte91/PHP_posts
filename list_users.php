<?php 
require './db.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>Список пользователей</h1>";

foreach($users as $user) {
  echo $user['id'] . ': ' . htmlspecialchars($user['username']) . ' <a href="update_user.php?user_id=' . $user['id'] . '">Редактировать имя</a>  <a href="delete_user.php?user_id=' . $user['id'] . '">Удалить пользователя</a><br>';
}