<?php
  $page_title = "Startsida";
  include("includes/header.php");
  if (file_exists('todolist.json')) {
    $todoListData = json_decode(file_get_contents('todolist.json'), true);
  }
  

  if (isset($_POST['submit'])) {
    $todoList = new Todo($_POST);
    $validated = $todoList->validate();
    $data = $validated->getData();
    if (!count($data['errors']) > 0) {
      unset($data['errors']);
      $todoListData[] = $data;
      file_put_contents('todolist.json', json_encode($todoListData, JSON_PRETTY_PRINT));
    } 
  }

?>

<h2>Todo-list</h2>
<?php
  if (isset($todoListData)) {
    foreach ($todoListData as $listItem) {
      echo '<form action="delete.php" method="post"><p>Todo: ' . $listItem['todo'] . '</p><p>Author: ' . $listItem['author'] . '</p><p>Date: ' . $listItem['date'] . '</p><input type="hidden" name="id" value="' . $listItem['id'] . '"><button type"submit">Delete</button>' . '</form>';
    }
  }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" name="todo" id="todo-text" placeholder="Att göra...">
  <input type="text" name="author" id="author-name" placeholder="Ditt namn...">
  <button type="submit" name="submit">Lägg till</button>
  <div class="error">
    <p><?php echo $data['errors']['todo'] ?? '' ?></p>
    <p><?php echo $data['errors']['author']  ?? '' ?></p>
  </div>
</form>

<form action="deleteall.php" methord="post">
  <button type="submit">Clear</button>
</form>

<?php
include("includes/footer.php");