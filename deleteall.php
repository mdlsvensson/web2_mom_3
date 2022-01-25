<?php
  // Clear the json file
  file_put_contents('todolist.json', '[]');

  // Header to stay on main page
  header('Location: index.php');
?>
