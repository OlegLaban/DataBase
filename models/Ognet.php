<?php
class Ognet
{
  public static function srokGodnosti($date)
  {
    $db = Db::getConnection();
    $date = intval($date);
    $sql = "SELECT cars.car_id, cars.otdel_id, cars.pod_otdel_id, "
     . " cars.marka, cars.production_year, cars.srok_ognet, cars.srok_aptechki, "
     . " cars.smotr, cars.number, cars.number_code, otdel.otdel_name "
     . " FROM `cars` INNER JOIN `otdel` ON (cars.otdel_id = otdel.otdel_id) "
     . " WHERE `srok_ognet` < :nowMonth";
    $resultDb = $db->prepare($sql);
    $resultDb->execute(array(
      ':nowMonth' => $date,
    ));
    $result = $resultDb->fetchAll();
    return $result;

  }
  public static function countNoteOgnet($date)
  {
    $db = Db::getConnection();
    $date = intval($date);
    $sql = "SELECT COUNT('car_id') AS `count` FROM `cars` WHERE `srok_ognet` < :nowMonth";
    $resultDb = $db->prepare($sql);
    $resultDb->execute(
      array(
        ':nowMonth' => $date,
      )
    );
     return $result = $resultDb->fetch();
  }
}
?>
