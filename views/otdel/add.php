<?php
  require_once(ROOT . '/views/include/header.php');
?>

<div id="container">
  <div class="wrapForm">
    <h2>Добавление отдела:</h2>
    <form method="POST">
      <input type="text" name="otdel_name" placeholder="Название отдела"><br>
      <input type="submit" value="Добавить отдел">
    </form>
  </div>
</div>


<?php
  require_once(ROOT . '/views/include/footer.php');
?>
