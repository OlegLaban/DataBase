<?php
class OtdelController
{
  public function actionAdd(){
    Otdel::addOtdel($_POST);
    require_once(ROOT . '/views/otdel/add.php');
    return true;
  }
}


?>
