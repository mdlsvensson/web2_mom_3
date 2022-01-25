<?php
  class Todo {
    private $data;
    private $errors = [];

    public function __construct($post) {
      $this->data = $post;
    }

    public function validate() {
      $this->validateTodo();
      $this->validateAuthor();
      $this->getDate();
      $this->genId();
      $this->data += array('errors' => $this->errors);
      unset($this->data['submit']);
      return $this;
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
      }
    }

    private function getDate() {
      $this->data += array('date' => date('Y-m-d:H.i.s'));
    }

    private function genId() {
      $this->data += array('id' => uniqid());
    }

    private function addError($key, $val) {
      $this->errors[$key] = $val;
    }

    public function getData() {
      return $this->data;
    }
  }
?>