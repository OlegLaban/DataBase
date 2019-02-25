<?php
class OgnetController
{
  public static function actionIndex($page = 1)
  {
      $nowMonth = Other::correctDate($_POST);
      $nowViewDate = Other::correctDateForView($_POST);
      $resultArr = Ognet::srokGodnosti($nowMonth);
      $total = Ognet::countNoteOgnet($nowMonth)['count'];
      $pagination = new Pagination($total, $page, Cars::SHOW_BY_DEFAULT, 'page-');
      require_once(ROOT . '/views/ognet/index.php');
      return true;
  }


}

?>
