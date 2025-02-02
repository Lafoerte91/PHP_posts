<?php 
use App\Database;
use App\ChatRepository;
require_once __DIR__ . './src/Database.php';
require_once __DIR__ . './src/ChatRepository.php';

$db = new Database('db', 'chat_db', 'root', '');
$chatRepo = new ChatRepository($db->getConnection());

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $text = $_POST['text'];

  $chatRepo->addMessage($username, $text);

  header("Location: index.php");
  exit();
}

$messages = $chatRepo->getAllMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Онлайн-чат</title>
</head>
  <h1>Онлайн-чат</h1>
  <form method="post">
    <label>Имя: <input type="text" name="username" value=""></label>
    <textarea name="text" rows="3"  cols="50" placeholder="Введите сообщение"></textarea>
    <button type="submit">Отправить</button>
  </form>

<?php foreach($messages as $msg): ?> 
<div class="chat_message">
  <div class="username"><?= htmlspecialchars($msg['username']); ?></div>
  <div class="text"><?= nl2br(htmlspecialchars($msg['text'])); ?></div>
  <div class="time"><?= htmlspecialchars($msg['created_at']); ?></div>
</div>
<?php endforeach ?>
</body>
</html>