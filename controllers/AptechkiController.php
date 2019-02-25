<?php
class AptechkiController
{
  public function actionIndex($page = 1)
  {
    $nowMonth = Other::correctDate($_POST);
    $nowViewDate = Other::correctDateForView($_POST);
    $resultArr = Aptechki::srokGodnosti($nowMonth);
    $total = Aptechki::countNoteAptechki($nowMonth)['count'];
    $pagination = new Pagination($total, $page, Cars::SHOW_BY_DEFAULT, 'page-');
    require_once(ROOT . "/views/aptechki/index.php");
    return true;
  }



}

?>
