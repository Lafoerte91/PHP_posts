<?php 
namespace App;
use PDO;

class PostRepository {
  public function __construct(private $pdo) {}

  public function createPost(int $userId, string $title, string $content):void {
    $stmt = $this->pdo->prepare("INSERT INTO posts(user_id, title, content) VALUES(:user_id, :title, :content)");
    $stmt->execute(['user_id' => $userId, 'title' => $title, 'content' => $content]);
  }

  public function getAllPosts():array {
    $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $posts = [];

    foreach($rows as $row) {
      $posts[] = new Post(
        id: (int)$row['id'],
        userId: (int)$row['user_id'],
        title: (string)$row['title'],
        content: (string)$row['content'],
        createdAt: (string)$row['created_at']
      );
    }
    return $posts;
  }

  public function getPostByUser(int $userId):array {
    $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC");
    $stmt->execute(['user_id' => $userId]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $posts = [];

    foreach($rows as $row) {
      $posts[] = new Post(
        id: (int)$row['id'],
        userId: (int)$row['user_id'],
        title: (string)$row['title'],
        content: (string)$row['content'],
        createdAt: (string)$row['created_at']
      );
    }
    return $posts;
  }
}