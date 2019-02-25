<?php
class Other
{
  public static function correctDate($postArr)
  {
    if(isset($postArr['month'])){
      return $nowMonth = strtotime("01." . $postArr['month'] . "." . $postArr['year']);
    }else{
      return $nowMonth = strtotime("01." . date("m.Y"));
    }
  }

  public static function correctDateForView($postArr)
  {
    if(isset($postArr['month']))
    {
      if(strlen($postArr['month']) < 2){
        $postArr['month'] = "0" . $postArr['month'];
      }
        return $postArr['month'] .".". $postArr['year'];
    }else{
        return date("m.Y");
    }
  }
}

?>
