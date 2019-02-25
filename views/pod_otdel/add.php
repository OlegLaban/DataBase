<?php
  require_once(ROOT . '/views/include/header.php');
?>

<div id="container">
  <div class="wrapForm">
    <h2>Добавление под отдела:</h2>
    <form method="POST">
      <select name="otdel_id">
        <?php foreach ($OtdelsInfo as $value): ?>
          <option value="<?=$value['otdel_id']?>"><?=$value['otdel_name']?></option>
        <?php endforeach; ?>
      </select>
      <input type="text" name="pod_otdel_name" placeholder="Название поды отдела"><br>
      <input type="submit" value="Добавить под отдел">
    </form>
  </div>
</div>


<?php
  require_once(ROOT . '/views/include/footer.php');
?>
