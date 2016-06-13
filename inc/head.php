<?php

function imprimir_head($titulo)
{
	global $url;
	global $nombre;

	print "<!DOCTYPE html>";
	print "<html lang=\"es\">";
	print "<head>";
	print "<meta charset=\"UFT-8\">";
	print "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
	print "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
	print "<meta name=\"description\" content=\"Tutoriales sobre informática relacionados con el hacking, noticias del mundo tecnológico, diccionarios para ataques por fuerza bruta y listado de webs que te pueden ayudar en tu aprendizaje\">";
	print "<meta name=\"keywords\" content=\"Hacking, Noticias, Tutoriales, Diccionarios, Programación\">";
	print "<meta name=\"author\" content=\"Álvaro Ramos (v4char)\">";
	print "<title>$nombre$titulo</title>";
	print "<link href=\"$url/css/bootstrap.min.css\" rel=\"stylesheet\">";
	print "<!--[if lt IE 9]>";
	print "<script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>";
	print "<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>";
	print "<![endif]-->";
	print "<link rel=\"shortcut icon\" type=\"image/png\" href=\"$url/favicon.png\"/>";
	print "<link href=\"$url/css/navbar-fixed-top.css\" rel=\"stylesheet\">";
	print "</head>";
	print "<body>";
}

?>
