<?php
  class Todo {
    // $data holds all input data
    private $data;
    // Errors are added to this array thought the validate functions
    private $errors = [];

    // handle the post data
    public function __construct($post) {
      $this->data = $post;
    }

    // Main input validation function
    public function validate() {
      $this->validateTodo();
      $this->validateAuthor();
      $this->getDate();
      $this->genId();
      // Add errors to data
      $this->data += array('errors' => $this->errors);
      // Remove submit index from data
      unset($this->data['submit']);
      return $this;
    }

    private function validateTodo() {

      // If todotext is empty
      if (empty($this->data['todo'])) {
        $this->addError('todo', 'Please enter a todo-text.');
      // if todotext is less than 5 characters
      } else if (strlen($this->data['todo']) < 5) {
        $this->addError('todo', 'Todo-text must not be less than 5 characters.');
      }
    }

    private function validateAuthor() {
      // If author field is empty
      if (empty($this->data['author'])) {
        $this->addError('author', 'Please enter author.');
      }
    }

    // generate a date string
    private function getDate() {
      $this->data += array('date' => date('Y-m-d:H.i.s'));
    }

    // Give each todo item a unique id
    private function genId() {
      $this->data += array('id' => uniqid());
    }

    // Create error function
    private function addError($key, $val) {
      $this->errors[$key] = $val;
    }

    // Get function
    public function getData() {
      return $this->data;
    }
  }
?>