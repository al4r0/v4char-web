<?php
function imprimir_login_admin()
{
	print "<div class=\"container\">";
	print "<div class=\"panel panel-default\">";
	print "<div class=\"panel-body\">";
	comprobar_login();
	print "<form action=\"index.php\" method=\"post\">";
	print "<div class=\"form-group\">";
	print "<label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Usuario</label>";
	print "<div class=\"col-sm-10\">";
	print "<input type=\"text\" class=\"form-control\" id=\"user\" placeholder=\"Usuario\" name=\"user\">";
	print "</div>";
	print "</div>";
	print "<div class=\"form-group\">";
	print "<label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Contraseña</label>";
	print "<div class=\"col-sm-10\">";
	print "<input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Contraseña\" name=\"pwd\">";
	print "</div>";
	print "</div>";
	print "<div class=\"form-group\">";
	print "<div class=\"col-sm-offset-2 col-sm-10\">";
	print "<button type=\"submit\" class=\"btn btn-default\">Entrar</button>";
	print "</div>";
	print "</div>";
	print "</form>";
	print "</div>";
	print "</div>";
	print "</div>";
}

function comprobar_login()
{
	global $mysqli;
	if (isset($_POST['user'],$_POST['pwd']))
	{
		$usuario = $_POST['user'];
		$usuario = $mysqli->real_escape_string($_POST['user']);
		$password = $mysqli->real_escape_string($_POST['pwd']);
		$password = md5(md5($password));
		$password = hash("sha512", $password);

		$query="SELECT * FROM usuarios WHERE user='$usuario' and pass='$password'";
		$resultado = $mysqli->query($query);
		$cuenta = $resultado->num_rows;

		if ($cuenta==1)
		{
			session_start();
			$_SESSION['acceso']="@login";
			header("Location: admin.php");

		} else
		{
			print "<div class=\"alert alert-danger\" role=\"alert\">";
			print "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>";
			print "<span class=\"sr-only\">Error:</span>";
			print " Fallo al entrar";
			print "</div>";
		}	
	}
}

?>
