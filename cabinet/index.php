<?php 
session_start();

require_once ("../config.php");

$login = strip_tags(htmlentities($_POST["login"]));
$pass = md5(strip_tags(htmlentities($_POST["pass"])));

$arrLogin = [];
$arrPass = [];

$divnk = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error - ".mysqdiv_error($divnk));
$query = mysqli_query($divnk, "SELECT users.login,users.password FROM users");

while($data = mysqli_fetch_array($query)){
  array_push($arrLogin, $data["login"]);
  array_push($arrPass, $data["password"]);
}

for($i=0; $i<count($arrLogin); $i++){
  if($arrLogin[$i]==$login && $arrPass[$i]==$pass){
    $_SESSION["access"]=true;
    break;
  }
  else{
    $_SESSION["access"]=false;
  }
}

if($_SESSION["access"]){

  $query = mysqli_query($divnk, "SELECT * FROM users WHERE users.login='$login' AND users.password='$pass'");
  $data = mysqli_fetch_array($query);

  print_r($data);
  $_SESSION["data"]=$data;
  print_r($_SESSION["data"]);
}
else{
  header("Location: /auth.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://api-maps.yandex.ru/2.1/?apikey=1f2ccf9c-c906-4690-97af-28faf3e09906&lang=ru_RU" type="text/javascript"></script>
  <script src="change.js"></script>
  <title>Личный кабинет <?=$data["FIO"];?></title>
</head>
<body>
  <div lass="list">
    <form class="form" type="post" action="../update_user.php">
      <div class="element">
        <?=$data["FIO"];?>
        <input class="form-input hide" type="text" id="fio" name="fio" value="<?=$data["FIO"];?>">
      </div>
      
      <div class="element">
        <?=$data["status"];?>
        <select class="form-input hide" name="status" id="status">
          <option value="Физическое лицо" selected>Физическое лицо</option>
          <option value="Юридическое лицо">Юридическое лицо</option>
        </select>
      </div>
        
      <div class="element" >
        <?=$data["number"];?>
        <input class="form-input hide" type="text" id="number" name="number" value="<?=$data["number"];?>">
      </div>
        
      <div class="element" id="city">
        <?=$data["city"];?>
          <input class="form-input hide" type="text" id="city" name="city" value="<?=$data["city"];?>">
      </div>
      
      <div class="element" id="street">
        <?=$data["street"];?>
          <input class="form-input hide" type="text" id="street" name="street" value="<?=$data["street"];?>">
      </div>

      <div class="element" id=home>
        <?=$data["home"];?>
          <input class="form-input hide" type="text" id="home" name="home" value="<?=$data["home"];?>">
      </div>

      <input type="hidden" name="login" id="login" value="<?=$data["login"];?>" >
      <button class="btn">Change</button>
      <button class="send hide">Ok</button>
    </form>

  </div>

  <div class="map" id="map"></div>
  <script src="../map.js"></script>
</body>
</html>