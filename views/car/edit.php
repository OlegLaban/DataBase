<?php
  require_once(ROOT . '/views/include/header.php');
?>

<div id="container">
  <h1>Редактирование информации по автомобилю (должны быть заполнены все поля):</h1>
  <aside class="aside carPattern">
    <form action="" method="POST">
      <h2>Автомобиль: <?php echo $resultArr['marka'] . " " . $resultArr['number'] . " "
      .  $resultArr['number_code'];?>  </h2>.
      <ul>
        <li>Марка авто: <?php echo $resultArr['marka']; ?>. /
           <input type="text" name="marka" value="<?php echo $resultArr['marka']; ?>">
         </li>
        <li>Номерной знак: <?php echo $resultArr['number'] . " "
        .  $resultArr['number_code'];?>.
        /
        <input type="text" value="<?php echo $resultArr['number']; ?>" name="number">
        <input  type="text" name="numberCode" value="<?php echo $resultArr['number_code']; ?>">
      </li>
        <li>
          Отдел: <?php echo $resultArr['otdel_name']; ?>. /
          <select name="otdel">
            <option>Выберите отдел</option>
            <?php foreach ($otdelArr as $value): ?>
              <option value="<?php echo $value['otdel_id'];?>"
              <?php if($value['otdel_id'] == $resultArr['otdel_id']){ echo " selected=\"selected\" "; } ?>>
                <?php echo $value['otdel_name']; ?>
              </option>
            <?php endforeach;?>
          </select>
        </li>
        <li>
          Под отдел: <?php echo $resultArr['pod_otdel_name']; ?>. /
          <select name="podOtdel">
            <option>Выберите под отдел</option>
            <?php foreach ($podOtdelArr as $value): ?>
              <option value="<?php echo $value['pod_otdel_id'];?>"
                <?php if($value['pod_otdel_id'] == $resultArr['pod_otdel_id']){ echo " selected=\"selected\" "; } ?> >
                <?php echo $value['pod_otdel_name']; ?>
              </option>
            <?php endforeach;?>
          </select>
        </li>
        <li>Год выпуска: <?php echo $resultArr['production_year']; ?>.
          / <input type="text" name="yearProd" value="<?php  echo $resultArr['production_year'];  ?>"></li>
        <li>
          Срок годности аптечки: <?php echo date("m-Y", intval($resultArr['srok_aptechki'])); ?>. /
          <input type="text" name="monthApt" value="<?php  echo Cars::fromUnixTime($resultArr['srok_aptechki'], "m"); ?>">
          -
          <input type="text" name="yearApt" value="<?php  echo Cars::fromUnixTime($resultArr['srok_aptechki'], "Y"); ?>">
        </li>
        <li>
          Срок годности огнетушителя: <?php echo date("m-Y", intval($resultArr['srok_ognet'])); ?>. /
          <input type="text" name="monthOgn" value="<?php  echo Cars::fromUnixTime($resultArr['srok_ognet'], "m"); ?>">
           -
          <input type="text" name="yearOgn" value="<?php  echo Cars::fromUnixTime($resultArr['srok_ognet'], "Y"); ?>" >
        </li>
        <li>Тех. осмотр: <?php echo Cars::fromUnixTime($resultArr['smotr'], "m-Y"); ?> /
          <input type="text" name="monthSmotr" value="<?php  echo Cars::fromUnixTime($resultArr['smotr'], "m");  ?>">
          -
          <input type="text" name="yearSmotr" value="<?php  echo Cars::fromUnixTime($resultArr['smotr'], "Y");  ?>">
       </li>
      </ul>
      <input type="hidden" name="id" value="<?php echo $resultArr['car_id']; ?>">
      <input type="submit" name="submit" value="Сохранить изменения" class="sub">
    </form>
  </aside>
</div>

<?php
  require_once(ROOT . '/views/include/footer.php');
?>
