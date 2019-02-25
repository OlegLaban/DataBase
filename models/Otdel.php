<?php
class Otdel
{
  public static function addOtdel($data)
  {
    if(!empty($data)){
      // Принцип действия передем массив который передается в execute ключи массива должны быть плэйсхолдарами.
      //Правило именование плейсхолдеров: они должны называться так же как и таблицы, но с двоеточием.
      $array = [
        ':otdel_id' => NULL,
        ':otdel_name' => $data['otdel_name']
      ];
      DbQueryes::insertQery($array, 'otdel');
    }

  }

  public static function getOtdelsInfo()
  {
    $db = Db::getConnection();
    $sql = "SELECT * FROM `otdel`";
    $result  = $db->query($sql);
    return $result->fetchAll();
  }
}

?>
