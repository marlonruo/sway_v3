<?php
	include ("conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	$id = $_GET['id'];
	$campana = $_GET['campana'];
	$puntos = '10';
	$estrellas = '5';
	$fecha = date("Y-m-d h:i:s");
	$pasa='si';
	
			 $result2 = mysql_query("SELECT * FROM puntos WHERE usuario='$id' and campana='$campana'");
			 while($row2=mysql_fetch_array($result2)){
				$pasa = "no";
			 }
			if($pasa=='si'){
			 	$result = mysql_query("INSERT INTO puntos (usuario, campana, puntos, estrellas, fecha) VALUES ('$id', '$campana', '$puntos', '$estrellas', '$fecha')");
			}
			echo $pasa;

?>