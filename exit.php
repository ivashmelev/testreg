<?php
//Реализация кнопки выход
session_start();

session_destroy();
header("Location: .");

?>