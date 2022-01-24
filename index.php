<?php
$page_title = "Startsida";
include("includes/header.php");
?>

<h2>Att göra lista</h2>
<form action="post">
  <input type="text" name="todo" id="todo-text" placeholder="Att göra...">
  <input type="text" name="author" id="author-name" placeholder="Ditt namn...">
  <button type="submit">Lägg till</button>
</form>

<?php
include("includes/footer.php");