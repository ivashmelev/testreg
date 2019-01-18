<?
session_start();

if($_SESSION['access']){
  header("Location: /cabinet/index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="node_modules/jquery.maskedinput/src/jquery.maskedinput.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="script.js"></script>
  <title>Registration</title>
</head>
<body>
  <div class="form">
    <form action="add_user.php" method="post" class="form-auth">
      <label for="fio">ФИО</label>
      <input class="form-input" type="text" id="fio" name="fio">

      <label for="status">Статус</label>
      <select class="form-input" name="status" id="status">
        <option value="Физическое лицо" selected>Физическое лицо</option>
        <option value="Юридическое лицо">Юридическое лицо</option>
      </select>

      <label for="number">Номер</label>
      <input class="form-input" type="text" id="number" name="number">

      <label for="addres">Адрес:</label>
      <div class="addres" id="addres">
        <label for="city">Город</label>
        <input class="form-input" type="text" id="city" name="city">

        <label for="street">Улица</label>
        <input class="form-input" type="text" id="street" name="street">

        <label for="home">Дом</label>
        <input class="form-input" type="text" id="home" name="home">
      </div>

      <label for="login">Логин</label>
      <input class="form-input" type="text" name="login" id="login">

      <label for="pass">Пароль</label>
      <input class="form-input" type="text" name="pass" id="pass">

      <div class="captcha"></div>

      <input type="submit" value="Ok">


    </form>
  </div>
</body>
</html>
