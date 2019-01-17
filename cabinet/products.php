<?php

session_start();

require_once ("../config.php");

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error".mysqli_error($link));
$query = mysqli_query($link, "SELECT * FROM products");

$arrResult = [];
$status = $_SESSION["data"]["status"];

if($status=="Юридическое лицо"){
  while($data = mysqli_fetch_array($query)){
    $data["price"]=$data["price"]*2;
    array_push($arrResult, $data);
  }
}
else{
  while($data = mysqli_fetch_array($query)){
    array_push($arrResult, $data);
  }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="products">
  <?foreach($arrResult as $elem):?>
    <!-- <? print_r($elem["name"]);?> -->
    <div class="element-products">
      <p class="name"><?=$elem["name"];?></p>
      <label for="" class="price"><?=$elem["price"]." $";?></label>
      <p class="description"><i><?=$elem["description"];?></i></p>
    </div>
  <?endforeach?>
  </div>
</body>
</html>