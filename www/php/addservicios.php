<?php
	session_start();
	include ("conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	$id = $_GET['id'];
	$se1 = $_GET['se1'];
	$se2 = $_GET['se2'];
	$se3 = $_GET['se3'];
	$se4 = $_GET['se4'];
	$se5 = $_GET['se5'];
	$fecha = date("Y-m-d h:i:s");

			
			
			if($se1!='Telefono'){
			 	$result = mysql_query("INSERT INTO servicios (usuario, servicio, info, fecha) VALUES ('$id', '1', '$se1', '$fecha')");
			}
			if($se2!='No cuenta'){
			 	$result = mysql_query("INSERT INTO servicios (usuario, servicio, info, fecha) VALUES ('$id', '2', '$se2', '$fecha')");
			}
			if($se3!='Usuario'){
			 	$result = mysql_query("INSERT INTO servicios (usuario, servicio, info, fecha) VALUES ('$id', '3', '$se3', '$fecha')");
			}
			if($se4!='Usuario'){
			 	$result = mysql_query("INSERT INTO servicios (usuario, servicio, info, fecha) VALUES ('$id', '4', '$se4', '$fecha')");
			}
			if($se5!='Usuario'){
			 	$result = mysql_query("INSERT INTO servicios (usuario, servicio, info, fecha) VALUES ('$id', '5', '$se5', '$fecha')");
			}
			//echo $pasa;

?>