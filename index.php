<?php
  $page_title = "Startsida";
  include("includes/header.php");

  if (isset($_POST['submit'])) {
    $todoList = new Todo($_POST);
    $validated = $todoList->validate();
  }

?>

<h2>Todo-list</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" name="todo" id="todo-text" placeholder="Att göra...">
  <input type="text" name="author" id="author-name" placeholder="Ditt namn...">
  <button type="submit" name="submit">Lägg till</button>
  <div class="error">
    <p><?php echo $validated['errors']['todo'] ?? '' ?></p>
    <p><?php echo $validated['errors']['author']  ?? '' ?></p>
  </div>
</form>

<?php
include("includes/footer.php");