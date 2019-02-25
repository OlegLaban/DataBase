<?php
  class Smotr
  {
    public static function srokSmotr($date)
    {
      $db = Db::getConnection();
      $sql = " SELECT cars.car_id, cars.otdel_id, cars.pod_otdel_id, cars.marka, cars.production_year, "
            . " cars.srok_ognet, cars.srok_aptechki, cars.smotr, cars.number, cars.number_code, otdel.otdel_name "
            . " FROM `cars` INNER JOIN `otdel` ON (cars.otdel_id = otdel.otdel_id)  "
            . " WHERE (((cars.production_year + :newCar) > :year) AND ((cars.smotr + :smotrForNewCar) < :yearMonthUnix)) OR "
            . "	(((cars.production_year + :newCar) < :year) AND ((cars.smotr + :smotrForOldCar) < :yearMonthUnix))";
      $resultDb = $db->prepare($sql);
      $resultDb->execute(
        array(
          ':newCar' => Config::NEW_CAR,
          ':year' =>  intVal(date("Y")),
          ':smotrForNewCar' =>  31556926 * Config::SMOTR_FOR_NEW_CAR,
          ':yearMonthUnix' => $date + 86400,
          ':smotrForOldCar' => 31556926 * Config::SMOTR_FOR_OLD_CAR
        )
      );
      return $result = $resultDb->fetchAll();
    }

    public static function countOldSmotrCars($date)
    {
      $db = Db::getConnection();
      $sql = " SELECT COUNT(`car_id`) AS `count` FROM `cars` "
            . " WHERE (((cars.production_year + :newCar) > :year) AND ((cars.smotr + :smotrForNewCar) <= :yearMonthUnix)) OR "
            . "	(((cars.production_year + :newCar) < :year) AND ((cars.smotr + :smotrForOldCar) <= :yearMonthUnix))";
      $resultDb = $db->prepare($sql);
      $resultDb->execute(
        array(
          ':newCar' => Config::NEW_CAR,
          ':year' =>  intVal(date("Y")),
          ':smotrForNewCar' =>  31556926 * Config::SMOTR_FOR_NEW_CAR,
          ':yearMonthUnix' => $date,
          ':smotrForOldCar' => 31556926 * Config::SMOTR_FOR_OLD_CAR
        )
      );
      return $result = $resultDb->fetch()['count'];
    }
  }

?>
