<?php
require './User.php';
require './Admin.php';

$user1 = new User('Alice');
$user2 = new User('Bob', 'admin');

$admin = new Admin('Evangelist', 'admin');
$admin->greet();
$admin->banUser($user1);