<?php
namespace App;

class User {

  public function __construct(private int $id, private string $username, private string $hashedPassword, private string $role='user') {
  }

  public function getId():int {
    return $this->id . '<br>';
  }
  public function getUsername():string {
    return $this->username . '<br>';
  }
  public function getRole():string {
    return $this->role . '<br>';
  }
  public function checkPassword(string $plainPassword):bool {
    return password_verify($plainPassword, $this->hashedPassword);
  }
}
