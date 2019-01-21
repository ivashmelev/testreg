<?php 

  //Добавление пользователя в БД и отправка письма админу
  require_once ("config.php");
  require_once ("smtp_mail.php");

  $fio = strip_tags(htmlentities($_POST["fio"]));
  $status = strip_tags(htmlentities($_POST["status"]));
  $number = strip_tags(htmlentities($_POST["number"]));
  $city = strip_tags(htmlentities($_POST["city"]));
  $street = strip_tags(htmlentities($_POST["street"]));
  $home = strip_tags(htmlentities($_POST["home"]));
  $login = strip_tags(htmlentities($_POST["login"]));
  $pass = md5(strip_tags(htmlentities($_POST["pass"])));

  $link = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error - ".mysqli_error($link));
  $query = mysqli_query($link, "INSERT INTO users VALUES(NULL, '$fio', '$status', '$number', '$city', '$street', '$home', '$login', '$pass')");

  smtpmail('Testreg', 'r3g.test@yandex.ru', 'Registration - '.$_SERVER["HTTP_HOST"],
                                                                "ФИО: $fio <br/>
                                                                Статус: $status <br/>
                                                                Номер: $number <br/>
                                                                Город: $city <br/>
                                                                Улица: $street <br/>
                                                                Дом: $home <br/>
                                                                Логин: $login <br/>
                                                                Пароль: $pass <br/>");

  header("Location: .");

?>
