<?php

function imprimir_menu($selcionado)
{
if ($selcionado == "inicio")
{
	$inicio = "class=\"active\"";
	$noticias = "";
	$hacking = "";
	$recursos = "";
	$contactar = "";
	$programar = "";
} else if ($selcionado == "noticias")
{
	$inicio = "";
	$noticias = "class=\"active\"";
	$hacking = "";
	$recursos = "";
	$contactar = "";
	$programar = "";
} else if ($selcionado == "hacking")
{
	$inicio = "";
	$noticias = "";
	$hacking = "class=\"active\"";
	$recursos = "";
	$contactar = "";
	$programar = "";
} else if ($selcionado == "recursos")
{
	$inicio = "";
	$noticias = "";
	$hacking = "";
	$recursos = "class=\"active\"";
	$contactar = "";
	$programar = "";
} else if ($selcionado == "contactar")
{
	$inicio = "";
	$noticias = "";
	$hacking = "";
	$recursos = "";
	$contactar = "class=\"active\"";
	$programar = "";
} else if ($selcionado == "programar")
{
	$inicio = "";
	$noticias = "";
	$hacking = "";
	$recursos = "";
	$contactar = "";
	$programar = "class=\"active\"";
} else
{
	$inicio = "";
	$noticias = "";
	$hacking = "";
	$recursos = "";
	$contactar = "";
	$programar = "";
}

global $url;

print "<nav class=\"navbar navbar-default navbar-fixed-top\">";
print "<div class=\"container\">";
print "<div class=\"navbar-header\">";
print "<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">";
print "<span class=\"sr-only\">Toggle navigation</span>";
print "<span class=\"icon-bar\"></span>";
print "<span class=\"icon-bar\"></span>";
print "<span class=\"icon-bar\"></span>";
print "</button>";
print "<a class=\"navbar-brand\" href=\"$url\"><span class=\"glyphicon glyphicon-console\"></span> v4char</a>";
print "</div>";
print "<div id=\"navbar\" class=\"navbar-collapse collapse\">";
print "<ul class=\"nav navbar-nav navbar-right\">";

print "<li $inicio><a href=\"$url\">Inicio</a></li>";
print "<li $noticias><a href=\"$url/noticias\">Noticias</a></li>";
print "<li $hacking><a href=\"$url/hacking\">Hacking</a></li>";
print "<li $programar><a href=\"$url/programar\">Programación</a></li>";
print "<li $recursos class=\"dropdown\">";
print "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Recursos <span class=\"caret\"></span></a>";
print "<ul class=\"dropdown-menu\">";
print "<li><a href=\"$url/webs\">Webs de interés</a></li>";
print "<li><a href=\"$url/diccionarios\">Diccionarios</a></li>";
print "</ul>";
print "</li>";
print "<li $contactar><a href=\"$url/contactar\">Contactar</a></li>";

print "</ul>";

print "</div>";
print "</nav>";
}
?>
