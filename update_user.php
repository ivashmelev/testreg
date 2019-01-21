<?php 
//Обновление данных в базе
require_once ("config.php");

$fio = strip_tags(htmlentities($_POST["fio"]));
$status = strip_tags(htmlentities($_POST["status"]));
$number = strip_tags(htmlentities($_POST["number"]));
$city = strip_tags(htmlentities($_POST["city"]));
$street = strip_tags(htmlentities($_POST["street"]));
$home = strip_tags(htmlentities($_POST["home"]));
$login = strip_tags(htmlentities($_POST["login"]));
echo "$fio, $number, $status, $login";

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error - ".mysqli_error($link));
$query = mysqli_query($link, "UPDATE users SET `FIO`='$fio', status='$status', number='$number', city='$city', street='$street', home='$home' WHERE login='$login'");




?>
