<?php
function imprimir_webs()
{
	global $mysqli;
	global $url;

	$query = "SELECT * FROM webs ORDER BY title";

	$resultado = $mysqli->query($query);
	
	print "<div class=\"container\">";
	print "<div class=\"panel panel-default\">";
	print "<div class=\"panel-heading\">";
	while ($fila = mysqli_fetch_array($resultado))
	{
		echo "<a target=\"_blank\" href=\"".htmlspecialchars($fila["url"])."\"><h3><span class=\"glyphicon glyphicon-globe\"></span> - ".htmlspecialchars($fila["title"])."</h3></a>";
	}
	print "</div></div></div>";

		mysqli_free_result($resultado);
}

function imprimir_diccionarios()
{
	global $mysqli;
	global $url;

	$query = "SELECT * FROM dic ORDER BY title";

	$resultado = $mysqli->query($query);
	
	print "<div class=\"container\">";
	print "<div class=\"panel panel-default\">";
	print "<div class=\"panel-heading\">";
	while ($fila = mysqli_fetch_array($resultado))
	{
		echo "<a target=\"_blank\" href=\"".htmlspecialchars($fila["archivo"])."\"><h3><span class=\"glyphicon glyphicon-download\"></span> - ".htmlspecialchars($fila["title"])."</h3></a>";
	}
	print "</div></div></div>";

		mysqli_free_result($resultado);
}
?>
