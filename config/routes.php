<?php
return array(
  'smotr/page-([0-9]+)' => 'ognet/index/$1',
  'smotr' => 'smotr/index',

  'ognet/page-([0-9]+)' => 'ognet/index/$1',
  'ognet' => 'ognet/index',

  'aptechki/page-([0-9]+)' => 'aptechki/index/$1',
  'aptechki' => 'aptechki/index',

  'otdel/add' => 'otdel/add',

  'podOtdel/add' => 'podOtdel/add',

  'car/delete/([0-9]+)' => 'car/deleteCar/$1',
  'car/edit/view/([0-9]+)' => 'car/editView/$1',
  'car/add' => 'car/addCar',
  'car/([0-9]+)' => 'car/view/$1',
  'page-([0-9]+)' => 'car/index/$1',
  '' => 'car/index',

);
