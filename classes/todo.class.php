<?php
  class Todo {
    protected $todoText;
    protected $authorName;
    protected $date;
  
    public function __construct(string $todoText, string $authorName, $date) {
      $this->author = $todoText;
      $this->title = $authorName;
      $this->releaseYear = $date;
    }
    public function writeBook() : string {
      return "Bokens titel ar " . $this->title . " och slapptes ar " . $this->releaseYear;
    }
  }
?>