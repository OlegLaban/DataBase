<?php
  require_once(ROOT . '/views/include/header.php');
?>

<div id='container'>
  <h2>Список авто которым нужно в
     <?php echo $nowViewDate; ?> заменить огнетушитель:</h2>
       <form class="userDate" action="" method="post">
         Выбрать дату:
         <input type="number" name="month" value="<?php if(isset($_POST['month'])){echo $_POST['month'];}else{echo date("n");} ?>" min="1" max="12">
         <input type="number" name="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];}else{echo date("Y");} ?>" min="2010" max="<?php echo date('Y', strtotime('+10 years')); ?>">
         <input type="submit" name="sub" value="Показать">
       </form>
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
