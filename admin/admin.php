<?php
require_once ('core.php');

imprimir_head(" - Admin");
imprimir_menu("");
eres_admin();
print "<div class=\"container\">";
print "<div class=\"panel panel-default\">";
print "<div class=\"panel-body\">";

if (isset($_GET['borrar']))
{
	$borrar = $mysqli->real_escape_string($_GET['borrar']);
	$query = "DELETE FROM post WHERE url='$borrar'";
	$resultado = $mysqli->query($query);
	print "<div class=\"alert alert-success\">Se ha borrado</div>";
}

else if (isset($_GET['crear']))
{
	if ($_GET['crear']== "true")
	{
		if (isset($_POST['title'],$_POST['url'],$_POST['cat'],$_POST['text']))
		{
			$title = $mysqli->real_escape_string($_POST['title']);
			$url_p = $mysqli->real_escape_string($_POST['url']);
			$cat = $mysqli->real_escape_string($_POST['cat']);
			$text = $mysqli->real_escape_string($_POST['text']);
			$fecha = date(DATE_RSS);

			$query = "INSERT INTO post (fecha, cat, url, title, text) VALUES ('$fecha','$cat','$url_p','$title','$text')";
			$resultado = $mysqli->query($query);

			print "<div class=\"alert alert-success\">Se ha enviado la noticia correctamente</div>";
		}
		print "<form action=\"\" method=\"post\">";
		print "<div class=\"form-group\">";
		print "<label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Título</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"title\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Url</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"url\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Categoría</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"cat\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<div class=\"col-sm-12\">";
		print "<center><textarea name=\"text\" style=\"width: 100%;\" rows=\"20\"></textarea></center>";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<div class=\"col-sm-offset-2 col-sm-10\">";
		print "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
		print "</div>";
		print "</div>";
		print "</form>";
	}
} else if (isset($_GET['editar']))
{
	$url_editar = $mysqli->real_escape_string($_GET['editar']);	

	if (isset($_POST['title'],$_POST['url'],$_POST['cat'],$_POST['text'],$_POST['enviar']))
	{
		$title = $mysqli->real_escape_string($_POST['title']);
		$url_p = $mysqli->real_escape_string($_POST['url']);
		$cat = $mysqli->real_escape_string($_POST['cat']);
		$text = $mysqli->real_escape_string($_POST['text']);
		$fecha = date(DATE_RSS);
			
		$query = "UPDATE post SET fecha='$fecha', cat='$cat', url='$url_p', title='$title', text='$text' WHERE url='$url_editar'";
		if ($resultado = $mysqli->query($query)){
			print "<div class=\"alert alert-success\">Se ha enviado la noticia correctamente</div>";
		}
	}

	
	$query = "SELECT * FROM post WHERE url='$url_editar'";
	$resultado = $mysqli->query($query);

	if ($fila = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		print "<form action=\"\" method=\"post\">";
		print "<div class=\"form-group\">";
		print "<label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Título</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"title\" value=\"".$fila["title"]."\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<label for=\"inputPassword3\" class=\"col-sm-2 control-label\" >Url</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"url\" value=\"".$fila["url"]."\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Categoría</label>";
		print "<div class=\"col-sm-10\">";
		print "<input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"cat\" value=\"".$fila["cat"]."\">";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<div class=\"col-sm-12\">";
		print "<center><textarea name=\"text\" style=\"width: 100%;\" rows=\"20\">".htmlspecialchars($fila["text"])."</textarea></center>";
		print "</div>";
		print "</div>";
		print "<div class=\"form-group\">";
		print "<div class=\"col-sm-offset-2 col-sm-10\">";
		print "<button type=\"submit\" class=\"btn btn-default\" name=\"enviar\">Enviar</button>";
		print "</div>";
		print "</div>";
		print "</form>";
		print "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		print "<a href=\"admin.php?borrar=$url_editar\">";
		print "<button type=\"button\" class=\"btn btn-danger\">Borrar</button>";
		print "</a>";
	}
		
}
else
{
	print "<a href=\"admin.php?crear=true\">";
	print "<button type=\"button\" class=\"btn btn-default\">Crear contenido</button>";
	print "</a>";
	$query = "SELECT * FROM post ORDER BY id DESC";
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
	$query = "SELECT * FROM post ORDER BY id DESC LIMIT 5 OFFSET $limite_1";

	if ($resultado = $mysqli->query($query))
	{
	} else
	{
		header("Location: $url/404");
	}

	while ($fila = mysqli_fetch_array($resultado))
	{
		print "<br><br><a href=\"admin.php?editar=".$fila["url"]."\">";
		print "<button type=\"button\" class=\"btn btn-warning\">".htmlspecialchars($fila["title"])."</button>";
		print "</a>";
	}
}

print "</div>";
print "</div>";
print "</div>";
imprimir_footer();
?>
