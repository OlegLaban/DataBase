<?php
  require_once(ROOT . '/views/include/header.php');
?>
<div id="container">
  <h1>Введите информацию об автомобиле:</h1>
  <aside class="aside carPatternNoFlex">
    <form action="" method="POST">
      <ul>
        <li>Марка авто / <input type="text" name="marka">. (Например: LADA PRIORA)</li>
        <li>Номерной знак / <input type="text" name="number"> - <input type="text" name="numberCode">. (Например: 4598 КМ-4 (ГК) (записывать нужно в разных полях) )</li>
        <li>
          Отдел /
          <select name="otdel">
            <option>Выберите отдел</option>
            <?php foreach ($otdelArr as $value): ?>
              <option value="<?php echo $value['otdel_id']; ?>"><?php echo $value['otdel_name']; ?></option>
            <?php endforeach;?>
          </select>
          .</li>
        <li>
          Под отдел: /
          <select name="podOtdel">
            <option>Выберите под отдел</option>
            <?php foreach ($podOtdelArr as $value): ?>
              <option value="<?php echo $value['pod_otdel_id']; ?>"><?php echo $value['pod_otdel_name']; ?></option>
            <?php endforeach;?>
          </select>
        </li>
        <li>Год выпуска / <input type="text" name="yearProd">.</li>
        <li>Срок годности аптечки / <input type="text" name="monthApt"> - <input type="text" name="yearApt">.</li>
        <li>Срок годности огнетушителя / <input type="text" name="monthOgn"> - <input type="text" name="yearOgn">.</li>
        <li>Тех. осмотр / <input type="text" name="monthSmotr"> - <input type="text" name="yearSmotr">.</li>
      </ul>
      <input type="submit" name="submit" value="Сохранить">
    </form>
  </aside>
</div>




<?php
  require_once(ROOT . '/views/include/footer.php');
?>
