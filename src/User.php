<?php
namespace App;

class User {

  public function __construct(private int $id, private string $username, private string $hashedPassword, private string $role='user') {
  }

  public function getId():int {
    return $this->id;
  }
  public function getUsername():string {
    return $this->username;
  }
  public function getRole():string {
    return $this->role;
  }
  public function checkPassword(string $plainPassword):bool {
    return password_verify($plainPassword, $this->hashedPassword);
  }
}
