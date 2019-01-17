<?php

require_once ("../config.php");

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error - ".mysqli_error($link));
$query = mysqli_query($link, "SELECT * FROM users");

$arrResult = [];
$i=1;

while($data = mysqli_fetch_array($query)){
  array_push($arrResult, $data);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://api-maps.yandex.ru/2.1/?apikey=1f2ccf9c-c906-4690-97af-28faf3e09906&lang=ru_RU" type="text/javascript"></script>
  <script src="change.js"></script>
  <title>Administrator</title>
</head>
<body>
    <?foreach($arrResult as $elem):?>
    <div class="user">
        <p class="element-user"><?=$i++;?> | </p>

        <p class="element-user"><?=$elem["FIO"];?></p>

        <p class="element-user"><?=$elem["status"];?></p>
        

        <p class="element-user"><?=$elem["number"];?></p>

        <p class="element-user"><?=$elem["city"];?></p>

        <p class="element-user"><?=$elem["street"];?></p>

        <p class="element-user"><?=$elem["home"];?></p>

        <p class="element-user"><?=$elem["login"];?></p>
        <p class="element-user"><?=$elem["password"];?></p>
        <button class="btn" id="<?=$i;?>">Change</button><br>
 
        <form action="../update_user.php" class="form" type="post" id="form-<?=$i;?>">
              <input class="form-input hide" type="text" id="fio" name="fio" value="<?=$elem["FIO"];?>">
              <select class="form-input hide" name="status" id="status">
                <option value="Физическое лицо" selected>Физическое лицо</option>
                <option value="Юридическое лицо">Юридическое лицо</option>
              </select>
              <input class="form-input hide" type="text" id="number" name="number" value="<?=$elem["number"];?>">
              <input class="form-input hide" type="text" id="city" name="city" value="<?=$elem["city"];?>">
              <input class="form-input hide" type="text" id="street" name="street" value="<?=$elem["street"];?>">
              <input class="form-input hide" type="text" id="home" name="home" value="<?=$elem["home"];?>">
              <input type="hidden" name="login" id="login" value="<?=$elem["login"];?>" >
              <input type="submit" class="send hide" value="Ok">
            </form>
      </div>
    <?endforeach?>
</body>
</html>