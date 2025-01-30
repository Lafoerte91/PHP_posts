<?php 

class Admin extends User {
  public function banUser(User $u):void {
    echo "Пользователь {$u->name} заблокирован";
  }
  public function greet():void {
    echo "Админ говорит...<br>";
  }
}