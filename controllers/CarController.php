<?php

class CarController
{

    public function actionIndex($page = 1)
    {
      $total = Cars::countNote();
      $pagination = new Pagination($total, $page, Cars::SHOW_BY_DEFAULT, 'page-');
      $resultArr = Cars::infoAllCars($page);
      require_once(ROOT . '/views/index.php');
      return true;
    }

    public function actionView($id)
    {
      $resultArr = Cars::infoForViewCar($id);
      require_once(ROOT . '/views/car/view.php');
      return true;
    }

    public function actionAddCar(){
      $otdelArr = Cars::getOtdelsInfo();
      $podOtdelArr = Cars::getPodOtdelInfo();

      if(isset($_POST['submit'])){
        $data = $_POST;
        Cars::putDataInBase($data);
      }
      require_once(ROOT . '/views/car/add.php');
      return true;
    }

    public function actionEditView($id)
    {
      if(isset($_POST['submit'])){
        $arrInfoAuto = $_POST;
        Cars::editCarName($arrInfoAuto);
      }

      $resultArr = Cars::infoForViewCar($id);
      $otdelArr = Cars::getOtdelsInfo();
      $podOtdelArr = Cars::getPodOtdelInfo();
      require_once(ROOT . '/views/car/edit.php');
      return true;
    }

    public function actionDeleteCar($id)
    {
      $id = intval($id);
      Cars::deleteCar($id);
      header("Location: /");
      return true;
    }
}
