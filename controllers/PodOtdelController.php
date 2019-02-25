<?php
class PodOtdelController
{
  public function actionAdd(){
    PodOtdel::addPodOtdel($_POST);
    $OtdelsInfo = DbQueries::selectQuery('*', 'otdel');
    require_once(ROOT . '/views/pod_otdel/add.php');
    return true;
  }
}

?>
