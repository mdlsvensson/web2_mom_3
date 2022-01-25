<?php
  $json = file_get_contents('todolist.json');
  $todoListData = json_decode($json, true);
  $id = $_POST['id'];
  foreach ($todoListData as $key => $todo) {
    if ($todo['id'] == $id) {
      unset($todoListData[$key]);
    }
  }
  file_put_contents('todolist.json', json_encode($todoListData, JSON_PRETTY_PRINT));
?>
