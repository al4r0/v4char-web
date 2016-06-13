<?php
require_once ('inc/core.php');

imprimir_head(" - Inicio");
imprimir_menu("inicio");

if (isset($_GET['url']) && $_GET['url'] != '')
{
	imprimir_url($_GET['url']);
} else
{
	print "<div class=\"container\">";
	print "<img src=\"$url/archivos/banner.gif\" width=\"100%\" class=\"img-thumbnail\">";
	print "</div>";
	print "<br>";
	imprimir_inicio();
}
imprimir_footer();
?>
