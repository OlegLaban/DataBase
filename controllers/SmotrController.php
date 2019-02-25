<?php
class SmotrController
{
  public function actionIndex($page = 1)
  {

    $nowMonth = Other::correctDate($_POST);
    $nowViewDate = Other::correctDateForView($_POST);
    $total = Smotr::countOldSmotrCars($nowMonth);
    $resultArr = Smotr::srokSmotr($nowMonth);
    $pagination = new Pagination($total, $page, Cars::SHOW_BY_DEFAULT, 'page-');
    require_once(ROOT . '/views/smotr/index.php');
    return true;
  }
}

?>
