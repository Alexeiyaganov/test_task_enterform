<?php
// Константы базы данных
define("DB_SERVER", "mysql");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "user_base");
$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysqli_error());
mysqli_set_charset($con,'utf8');
mysqli_select_db($con,DB_NAME) or die("Не удается подключиться к БД");
?>