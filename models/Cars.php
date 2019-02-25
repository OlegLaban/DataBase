<?php
class Cars
{
    const SHOW_BY_DEFAULT = 5;
    public static function infoForViewCar($id)
    {
      $db = Db::getConnection();
      $id = intval($id);
      $sql = "SELECT otdel.otdel_id, otdel.otdel_name, pod_otdel.pod_otdel_id,"
        . " pod_otdel.pod_otdel_name,  cars.car_id, cars.marka, cars.production_year,"
        . " cars.number, cars.number_code, "
        . " cars.srok_ognet, cars.srok_aptechki, cars.smotr FROM cars INNER JOIN otdel ON "
        . " (cars.otdel_id = otdel.otdel_id) INNER JOIN pod_otdel ON "
        . "(cars.pod_otdel_id = pod_otdel.pod_otdel_id) WHERE car_id = :id ";

      $result = $db->prepare($sql);
      $result->execute(array(
        ':id' => $id
      ));
      return $resultFetch = $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function infoAllCars($page, $count = self::SHOW_BY_DEFAULT)
    {
      $db = Db::getConnection();
      $count = intval($count);
      $page = intval($page);
      $offset = ($page - 1) * $count;
        $sql = "SELECT cars.marka, cars.car_id, otdel.otdel_name, cars.production_year, cars.srok_ognet,"
          . "cars.number, cars.number_code,"
          . "cars.srok_aptechki FROM cars INNER JOIN otdel ON (cars.otdel_id = otdel.otdel_id) "
          . "LIMIT {$count} OFFSET {$offset}";
      $result = $db->query($sql);
      $resultFetch = $result->fetchAll(PDO::FETCH_ASSOC);
      return $resultFetch;
    }


   public static function howMuchSmotr($production_year, $lastSmotr)
    {
      $razn = date("Y") - intval($production_year);
      $lastSmotr = explode('-',$lastSmotr);
      if($razn >= 5 ){
        $lastSmotr[1] += 1;
        return implode('-', $lastSmotr);
      }else{
        $lastSmotr[1] += 2;
        $lastSmotr = implode('-', $lastSmotr);
        return $lastSmotr;
      }
    }

    public static function putDataInBase($data)
    {
      $data['yearOgn'] = $data['yearOgn'] + 2;
      $data['srok_ognet'] = Cars::unixTimeMonthYear($data['monthOgn'], $data['yearOgn']);
      $data['srok_aptechki'] = Cars::unixTimeMonthYear($data['monthApt'], $data['yearApt']);
      $data['smotr'] = Cars::unixTimeMonthYear($data['monthSmotr'], $data['yearSmotr']);
      $db = Db::getConnection();
      $sql = "INSERT INTO `cars` (`car_id`, `otdel_id`, `pod_otdel_id`, `marka`,"
        . " `production_year`, "
        . " `srok_ognet`, `srok_aptechki`, `smotr`, `number`, `number_code`) "
        . " VALUES(:car_id, :otdel_id, :pod_otdel_id, :marka, :production_year,"
        . " :srok_ognet, :srok_aptechki, :smotr, :number, :number_code)";
      $result = $db->prepare($sql);
      $result->execute(
        array(
          ':car_id' => NULL,
          ':otdel_id' => $data['otdel'],
          ':pod_otdel_id' => $data['podOtdel'],
          ':marka' => $data['marka'],
          ':production_year' => (int) $data['yearProd'],
          ':srok_ognet' =>  $data['srok_ognet'],
          ':srok_aptechki' => $data['srok_aptechki'],
          ':smotr' => $data['smotr'],
          ':number' => (int) $data['number'],
          ':number_code' => $data['numberCode']
        )
      );

    }

    public static function editCarName($info)
    {
      $db = Db::getConnection();
      $info['srok_ognet'] = Cars::unixTimeMonthYear($info['monthOgn'], $info['yearOgn']);
      $info['srok_aptechki'] = Cars::unixTimeMonthYear($info['monthApt'], $info['yearApt']);
      $info['smotr'] = Cars::unixTimeMonthYear($info['monthSmotr'], $info['yearSmotr']);

      $sql = "UPDATE `cars` SET `otdel_id` = :otdel_id, `pod_otdel_id` = :pod_otdel_id,"
        . " `marka` = :marka, `production_year` = :production_year, `srok_ognet` = :srok_ognet, "
        . " `srok_aptechki` = :srok_aptechki, `smotr` = :smotr, `number` = :number, "
        . " `number_code` = :number_code WHERE `car_id` = :id";
      $result = $db->prepare($sql);
      $result->execute(
        array(
          ':otdel_id' => intval($info['otdel']),
          ':pod_otdel_id' => intval($info['podOtdel']),
          ':marka' => $info['marka'],
          ':production_year' => $info['yearProd'],
          ':srok_ognet' => $info['srok_ognet'],
          ':srok_aptechki' => $info['srok_aptechki'],
          ':smotr' => $info['smotr'],
          ':number' =>  intval($info['number']),
          ':number_code' => $info['numberCode'],
          ':id' => intval($info['id'])
        )
      );
    }

    public static function unixTimeMonthYear($month, $year, $day = "01"){
        return strtotime($day . "." . $month . "." . $year);
    }

    public static function deleteCar($id)
    {
      $db = Db::getConnection();
      $sql = "DELETE FROM `cars` WHERE `car_id` = :id";
      $result = $db->prepare($sql);
      $result->execute(
        array(
          ':id' => intval($id)
        )
      );
      var_dump($result);
    }

    public static function getOtdelsInfo()
    {
      $db = Db::getConnection();
      $sql = "SELECT * FROM `otdel`";
      $result = $db->query($sql);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPodOtdelInfo()
    {
      $db = Db::getConnection();
      $sql = "SELECT * FROM `pod_otdel`";
      $result = $db->query($sql);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fromUnixTime($unixTime, $type)
    {
        return date($type, intval($unixTime));
    }
    public static function countNote()
    {
      $db = Db::getConnection();
      $result = $db->query("SELECT COUNT(`car_id`) AS `count` FROM `cars`");
      $resultCount = $result->fetch(PDO::FETCH_ASSOC);
      return $resultCount['count'];
    }

}

?>
