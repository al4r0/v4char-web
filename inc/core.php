<?php
require_once ('inc/config.php');
require_once ('inc/head.php');
require_once ('inc/menu.php');
require_once ('inc/footer.php');
require_once ('inc/inicio.php');
require_once ('inc/noticias.php');
require_once ('inc/hacking.php');
require_once ('inc/recursos.php');
require_once ('inc/contactar.php');
require_once ('inc/programar.php');

function obtener_ip_real()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			return $_SERVER['HTTP_CLIENT_IP'];
		}   
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
        return $_SERVER['REMOTE_ADDR'];
    }

function registrar_visitas()
{
	global $mysqli;
	if (isset ($_SERVER["HTTP_REFERER"]))
	{
		$visitante_refer = $mysqli->real_escape_string($_SERVER["HTTP_REFERER"]);
	} else
	{
		$visitante_refer = $mysqli->real_escape_string("");
	}
	$visitante_ip = $mysqli->real_escape_string(obtener_ip_real()); 
	$visitante_url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	$visitante_url = $mysqli->real_escape_string($visitante_url);
	$visitante_fecha = $mysqli->real_escape_string(date(DATE_RFC2822));
	$visitante_user = $mysqli->real_escape_string($_SERVER['HTTP_USER_AGENT']);

	$query = "INSERT INTO log (ip,refer,url,useragent,fecha) VALUES ('$visitante_ip','$visitante_refer','$visitante_url','$visitante_user','$visitante_fecha')";
	$resultado = $mysqli->query($query);
}

registrar_visitas();
?>
