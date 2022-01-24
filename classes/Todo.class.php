<?php
  class Todo {
    private $data;
    private $errors = [];
    private static $fields = ['todo', 'author'];

    public function __construct($post) {
      $this->data = $post;
    }

    public function validate() {
      foreach(self::$fields as $field) {
        if (!array_key_exists($field, $this->data)) {
          trigger_error("$field is not present in data");
          return;
        }
      }

      $this->validateTodo();
      $this->validateAuthor();
      $this->getDate();
      $this->data += array('errors' => $this->errors);
      return $this->data;
    }

    private function validateTodo() {

      if (empty($this->data['todo'])) {
        $this->addError('todo', 'Please enter a todo-text.');
      } else if (strlen($this->data['todo']) < 5) {
        $this->addError('todo', 'Todo-text must not be less than 5 characters.');
      }
    }

    private function validateAuthor() {
      if (empty($this->data['author'])) {
        $this->addError('author', 'Please enter author.');
      } else {
        
      }
    }

    private function getDate() {
      $this->data += array('date' => date('Y-m-d:H.i'));
    }

    private function addError($key, $val) {
      $this->errors[$key] = $val;
    }
  }
?>