<?php
class PodOtdel
{
  public static function addPodOtdel($data)
  {
      if(!empty($data)){
        $array = [
          ':pod_otdel_id' => NULL,
          ':pod_otdel_name' => $data['pod_otdel_name'],
          ':otdel_id' => $data['otdel_id']
        ];
        DbQueryes::insertQery($array, 'pod_otdel');
      }

  }
}

?>
