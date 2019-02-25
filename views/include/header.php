<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/style/style.css">
  <title>База данных</title>
</head>
<body>
  <header>
    <h1>
      База данных по автомобилям.
    </h1>
    <button type="button" name="addCar" class="addCarBut <?php if($_SERVER['REQUEST_URI'] != '/'){echo 'hidden';} ?>">
      <a href="/car/add/">
        Добвить автомобиль
      </a>
    </button>
    <button type="button" name="addCar" class="addCarBut <?php if($_SERVER['REQUEST_URI'] != '/'){echo 'hidden';} ?>">
      <a href="/otdel/add/">
        Добвить отдел
      </a>
    </button>
    <button type="button" name="addCar" class="addCarBut <?php if($_SERVER['REQUEST_URI'] != '/'){echo 'hidden';} ?>">
      <a href="/podOtdel/add/">
        Добвить под отдел
      </a>
    </button>
    <nav id="nav">
      <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/ognet/">Огнетушители</a></li>
        <li><a href="/aptechki/">Аптечки</a></li>
        <li><a href="/smotr/">Тех-осмотр</a></li>
        <li>Повреждения</li>
      </ul>
    </nav>
  </header>
