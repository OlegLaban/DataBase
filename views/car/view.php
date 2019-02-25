<?php
  require_once(ROOT . '/views/include/header.php');
?>
<div id="container">
  <h1>Информация об автомобиле:</h1>
  <aside class="aside carPattern">
    <div class="wrapAuto">
      <h2>Автомобиль: <?php echo $resultArr['marka'] . " " . $resultArr['number'] . " "
      .  $resultArr['number_code'];?>  </h2>.
      <ul>
        <li>Марка авто: <?php echo $resultArr['marka']; ?>.</li>
        <li>Номерной знак: <?php echo $resultArr['number'] . " "
        .  $resultArr['number_code'];?>.</li>
        <li>Отдел: <?php echo $resultArr['otdel_name']; ?>.</li>
        <li>Под отдел: <?php echo $resultArr['pod_otdel_name']; ?>.</li>
        <li>Год выпуска: <?php echo $resultArr['production_year']; ?>.</li>
        <li>Срок годности аптечки: <?php echo date("m-Y", intval($resultArr['srok_aptechki'])); ?>.</li>
        <li>Срок годности огнетушителя: <?php echo date("m-Y", intval($resultArr['srok_ognet'])); ?>.</li>
        <li>Тех. осмотр: <?php echo Cars::fromUnixTime($resultArr['smotr'], 'm-Y'); ?> /
          <?php echo Cars::howMuchSmotr($resultArr['production_year'], Cars::fromUnixTime($resultArr['smotr'], 'm-Y')); ?> (последний/следующий).</li>
      </ul>
    </div>
    <div class="menuAuto">
      <h2>Меню:</h2>
      <button><a href="/car/edit/view/<?php echo $resultArr['car_id'];?>">Редактировать данные</a></button><br>
      <button><a class="del" href="/car/delete/<?php echo $resultArr['car_id'];?>">Удалить авто</a></button><br>
    </div>
    <div class="clear"></div>
  </aside>
</div>

<?php
  require_once(ROOT . '/views/include/footer.php');
?>
