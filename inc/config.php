<?php

$nombre = "v4char";
$url = "http://".$_SERVER["SERVER_NAME"]."";

$nombre = htmlspecialchars($nombre);
$url = htmlspecialchars($url);

$db_host = "host";
$db_user = "user";
$db_pass = "pass";
$db_name = "db";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqli->set_charset("utf8");

?>
