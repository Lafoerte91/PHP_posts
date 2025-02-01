<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>

<?php 
use App\Database;
use App\UserRepository;
use App\PostRepository;
require_once __DIR__ .  './src/Database.php';
require_once __DIR__ .  './src/Post.php';
require_once __DIR__  . './src/PostRepository.php';
require_once __DIR__  . './src/User.php';
require_once __DIR__  . './src/UserRepository.php';

$db = new Database(
  host: 'localhost',
  dbname: 'mini_project_db',
  user: 'root',
  password: 'root'
);
$pdo = $db->getConnection();
$userRepo = new UserRepository($pdo);
$postRepo = new PostRepository($pdo);

echo '<h1>Мини-проект</h1>';

if(isset($_GET['register'])) {
  $userRepo->createUser('Апостол', '12345');
  echo "Пользователь Апостол создан!<br>";
}

if(isset($_GET['login'])) {
  $user = $userRepo->findByUserName('Апостол');
  if($user && $user->checkPassword('12345')) {
    echo "Пользователь найден!<br>Привет, {$user->getUsername()}<br>";
    $loggedInUserId = $user->getId();
    $postRepo->createPost($loggedInUserId, 'Послание Титу', 'Послание к Титу — книга Нового Завета. Входит в число Посланий апостола Павла. Авторство Павла некоторыми учёными оспаривается; среди возможных авторов называют Поликарпа.');
    echo "Пост создан!<br>";
  } else {
    echo "Ошибка логина<br>";
  }
}

$allPosts = $postRepo->getAllPosts();

echo "<h2>Все посты</h2>";

foreach($allPosts as $post) {
  echo "<h3>{$post->getTitle()}</h3> <b>(user_id={$post->getUserId()})</b>";
  echo "<p>{$post->getContent()}</p>";
  echo "<em>Cоздано: {$post->getCreatedAt()}</em><hr>";
}
?>

<p>Ссылки для тестирования:</p>
<a href="?register=1">Регистрация пользователя</a><br>
<a href="?login=1">Авторизовать пользователя и создать пост</a><br>

