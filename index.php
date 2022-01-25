<?php
  $page_title = "Startsida";
  include("includes/header.php");
  // Check if json file exists
  if (file_exists('todolist.json')) {
    // if the file exists, get the json data and decode it into associative array
    $todoListData = json_decode(file_get_contents('todolist.json'), true);
  }
  
  // If todo form is submitted
  if (isset($_POST['submit'])) {
    // Create new object from Todo class
    $todoList = new Todo($_POST);
    // Run validate function in class to check input
    $validated = $todoList->validate();
    // Run get data method to get the input data
    $data = $validated->getData();
    // If there are no errors with input
    if (!count($data['errors']) > 0) {
      // Unset the errors index from array
      unset($data['errors']);
      // Append input data to json data
      $todoListData[] = $data;
      // Write the todolist to the json file, pretty print for readability
      file_put_contents('todolist.json', json_encode($todoListData, JSON_PRETTY_PRINT));
    } 
  }
?>

<h2>Todo-list</h2>
<?php
  // If there is todolist data
  if (isset($todoListData)) {
    // Loop the todolist data and write todolist items to DOM, add delete button/form which is linked to delete.php script and add the todo-item id to the hidden input value field.
    foreach ($todoListData as $listItem) {
      echo '<form action="delete.php" method="post"><p>Todo: ' . $listItem['todo'] . '</p><p>Author: ' . $listItem['author'] . '</p><p>Date: ' . $listItem['date'] . '</p><input type="hidden" name="id" value="' . $listItem['id'] . '"><button type"submit">Delete</button>' . '</form>';
    }
  }
?>
<!-- The main form -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" name="todo" id="todo-text" placeholder="Att göra...">
  <input type="text" name="author" id="author-name" placeholder="Ditt namn...">
  <button type="submit" name="submit">Lägg till</button>
  <div class="error">
    <!-- Write potential input errors -->
    <p><?php echo $data['errors']['todo'] ?? '' ?></p>
    <p><?php echo $data['errors']['author']  ?? '' ?></p>
  </div>
</form>

<!-- Form for clearing list, linked to deleteall.php script -->
<form action="deleteall.php" methord="post">
  <button type="submit">Clear</button>
</form>

<?php
include("includes/footer.php");