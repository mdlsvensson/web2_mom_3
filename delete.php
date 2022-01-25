<?php
  $json = file_get_contents('todolist.json');
  $todoListData = json_decode($json, true);
  $id = $_POST['id'];
  foreach ($todoListData as $todo) {
    $key = array_search($id, $todo);
    echo '<pre>';
    var_dump($key);
    echo '</pre>';
  }
  echo '<p> seperator </p>';
  unset($todoListData['id'][$id]);
  file_put_contents('todolist.json', json_encode($todoListData, JSON_PRETTY_PRINT));

?>
