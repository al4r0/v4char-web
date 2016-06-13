<?php
function imprimir_programar()
{
	global $mysqli;
	global $url;
		
	$query = "SELECT * FROM post WHERE cat='programar'";
	$resultado = $mysqli->query($query);

	$num_filas = mysqli_num_rows($resultado);
	if (isset($_GET['page']))
	{
		if (is_numeric($_GET['page']) && $_GET['page'] >= 1)
		{
			$limite_1 = $_GET['page']-1;
		} else
		{
			$limite_1 = 0;
		}
	} else
	{
		$limite_1 = 0;
	}
	
	$limite_1 = 5 * $limite_1;
	$limite_1 = $mysqli->real_escape_string($limite_1);
	$query = "SELECT * FROM post WHERE cat='programar' GROUP BY id ORDER BY id DESC LIMIT 5 OFFSET $limite_1";

	if ($resultado = $mysqli->query($query))
	{
	} else
	{
		header("Location: $url/404");
	}
print "<div class=\"container\">";
	while ($fila = mysqli_fetch_array($resultado))
	{
print "<div class=\"panel panel-default\">";
print "<div class=\"panel-heading\">";
print "<h3 class=\"panel-title\"><a href=\"$url/url/".htmlspecialchars($fila["url"])."\">".htmlspecialchars($fila["title"])."</a></h3>";
print "</div>";
print "<div class=\"panel-body\">";
print $fila["text"];
print "</div>";
print "</div>";
	}
	print "<center>";
	print "<ul class=\"pagination\">";
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	} else
	{
		$page = 1;
	}
	for ($i = 0; $i <= $num_filas/5; $i++)
	{
		$temp = $i + 1;
		if ($page == $temp)
		{
			print "<li class=\"active\"><a href=\"$url/programar/page/$temp\">$temp<span class=\"sr-only\">(current)</span></a></li>";
		}else
		{
			print "<li><a href=\"$url/programar/page/$temp\">$temp<span class=\"sr-only\">(current)</span></a></li>";
		}
	}
	print "</ul></center>";
	print "</div>";
}
?>
