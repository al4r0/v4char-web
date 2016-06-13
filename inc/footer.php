<?php
function imprimir_footer()
{
	global $url;
	global $mysqli;
	$query = "SELECT * FROM log GROUP BY ip HAVING COUNT(ip)>1";
	$resultado = $mysqli->query($query);
	$n_visitas = $resultado->num_rows;
	
	print "<div class=\"container\">";
	print "<div class=\"panel panel-default\">";
  	print "<div class=\"panel-body\">";
	print "<div style=\"text-align: center;\"><h4>v4char | 2016 | Visitas: $n_visitas <span class=\"glyphicon glyphicon-globe\"></span></h4></div>";
	print "</div>";
	print "</div>";
	print "</div>";
	print "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>";
	print "<script src=\"$url/js/bootstrap.min.js\"></script>";
	print "</body>";
	print "</html>";
}
?>
