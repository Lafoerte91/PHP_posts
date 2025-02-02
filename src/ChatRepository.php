<?php 
namespace App;
use PDO;


class ChatRepository {
  public function __construct(private PDO $pdo) {}

  public function addMessage(string $username, string $text):void {
    $stmt = $this->pdo->prepare("INSERT INTO messages(username, text) VALUES(:username, :text)");
    $stmt->execute(['username' => $username, 'text' => $text]);
  }

  public function getAllMessages():array {
    $stmt = $this->pdo->query("SELECT * FROM messages ORDER BY id DESC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}