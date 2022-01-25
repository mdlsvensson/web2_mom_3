<?php
  // Get json file
  $todoListData = json_decode(file_get_contents('todolist.json'), true);
  // Get id from post
  $id = $_POST['id'];
  // Loop todoListData and unset key that matches list item ID
  foreach ($todoListData as $key => $todo) {
    if ($todo['id'] == $id) {
      unset($todoListData[$key]);
    }
  }
  // Rewrite the json file as updated
  file_put_contents('todolist.json', json_encode($todoListData, JSON_PRETTY_PRINT));

  // Header to stay on main page
  header('Location: index.php');
?>
