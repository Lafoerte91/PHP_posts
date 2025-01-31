<?php 
namespace App;

class Post {
  public function __construct(
    private int $id,
    private int $userId,
    private string $title,
    private string $content,
    private string $createdAt
  ) {}

  public function getId():int {
    return $this->id;
  }
  public function getUserId():int {
    return $this->userId;
  }
  public function getTitle():string {
    return $this->title;
  }
  public function getContent():string {
    return $this->content;
  }
  public function getCreatedAt():string {
    return $this->createdAt;
  }
}