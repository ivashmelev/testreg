<?
session_start();

if($_SESSION['access']){
  header("Location: /cabinet/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="script.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
</head>
<body>
  <form action="/cabinet/index.php" method="post" class="form-auth">
    <label for="login">Логин</label>
    <input class="form-input" type="text" name="login" id="login">

    <label for="pass">Пароль</label>
    <input class="form-input" type="text" name="pass" id="pass">

    <input class="form-input" type="submit" value="Ok">

    <div class="window-captcha">
                                <div class="g-recaptcha" data-sitekey="6Ldg1ooUAAAAAMDZc7abq-vYpbmw6x0H8wgSbDwE"></div>

                                <div class="button-send" id="send_captcha">Отправить</div>
                            </div>

  <a href="auth.php">Регистрация</a>

  </form>
</body>
</html>