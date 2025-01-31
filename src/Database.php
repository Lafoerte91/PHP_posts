<?php 
namespace App;
use PDO;
use PDOException;

class Database {
  private PDO $pdo;
  
  public function __construct(
    private string $host,
    private string $dbname,
    private string $user,
    private string $password,
  ) {
    $this->connect();
  }

  private function connect():void {
    $dsn = "mysql:dbname={$this->dbname};host={$this->host};charset=utf8";

    try {
      $this->pdo = new PDO($dsn, $this->user, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Ошибка подключения: {$e->getMessage()}")
    }
  }

  public function getConnection(): PDO {
    return $this->pdo;
  }
}