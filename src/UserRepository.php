<?php 
namespace App;
use PDO;

class UserRepository {
  public function __construct(private PDO $pdo) {
  }
  public function createUser(string $username, string $plainPassword, string $role='user'):void {
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users(username, hashedPassword, role) VALUES(:username, :hashedPassword, :role)");
    $stmt->execute(['username' => $username, 'hashedPassword' => $hashedPassword, 'role' => $role]);
  }

  public function findByUserName(string $username): ?User {
    $stmt = $pdo->prepare("SELECT username FROM users WHERE username=:username");
    $stmt->execute(['username' => $username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!row) {
      return null
    }

    return new User (
      id: (int)$row['id'],
      username: $row['username'],
      hashedPassword: $row['password'],
      role: $row['role']
    )
  }
  public function findByUserId(int $id): ?User {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id=:id");
    $stmt->execute(['username' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!row) {
      return null
    }

    return new User (
      id: (int)$row['id'],
      username: $row['username'],
      hashedPassword: $row['password'],
      role: $row['role']
    )
  }
}