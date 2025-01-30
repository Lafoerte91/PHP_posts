<?php
class User {
  public string $name;
  private string $role;

  public function __construct(string $name, string $role='user') {
    $this->name = $name;
    $this->role = $role;
  }

  public function getRole():string {
    return $this->role . '<br>';
  }
  public function setRole($role):void {
    $this->role = $role;
  }

  public function canEditPosts():bool {
    return $this->role == 'admin';
  }
  public function greet():void {
    echo "Привет, {$this->name }, твоя роль: {$this->role}<br>";
  }
}
