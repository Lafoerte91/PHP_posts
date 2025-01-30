<?php
require './db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_POST['user_id'] ?? 0;
  $new_name = $_POST['username'] ?? '';
  $stmt = $pdo->prepare("UPDATE users set username=:new_name where id=:user_id");
  $stmt->execute(['new_name' => $new_name, 'user_id' => $user_id]);
  echo "Имя пользователя обновлено!<br>";
  ?>
  <a href="list_users.php">Вернуться к списку пользователей</a>
  <?php
} else {
  $user_id = $_GET['user_id'] ?? 0;
  $stmt = $pdo->prepare("SELECT * FROM users where id=:user_id");
  $stmt->execute(['user_id' => $user_id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if($user) {
    ?>
    <form action="" method="post">
      <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
      <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>">
      <button type="submit">Обновить</button>
    </form>
    <?php
  } else {
    echo 'Пользователь не найден';
  }
}