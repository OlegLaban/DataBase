<?php
  require_once(ROOT . '/views/include/header.php');
?>

<div id='container'>
  <h2>Список авто:</h2>
  <?php foreach ($resultArr as $value ): ?>
    <aside class="aside">
      <a href="/car/<?php echo $value['car_id']; ?>"><h2><?php echo $value['number']
      . " " . $value['number_code']; ?></h2></a>.
      <ul>
        <li>Марка авто: <?php echo $value['marka']; ?></li>
        <li>Отдел: <?php echo $value['otdel_name']; ?></li>
        <li>Год выпуска: <?php echo $value['production_year']; ?></li>
        <li>Срок годности аптечки: <?php echo Cars::fromUnixTime($value['srok_aptechki'], "m-Y"); ?></li>
        <li>Срок годности огнетушителя: <?php echo Cars::fromUnixTime($value['srok_ognet'], "m-Y"); ?></li>
      </ul>
      <div class="buttonPodr">
        <a href="/car/<?php echo $value['car_id']; ?>"
          title="Открыть подробнее авто <?php echo $value['number']
          . " " . $value['number_code']; ?> ">
            Подробнее
        </a>
      </div>
    </aside>
  <?php endforeach; ?>

  <?php echo $pagination->get(); ?>
                              





<?php
  require_once(ROOT . '/views/include/footer.php');
?>
