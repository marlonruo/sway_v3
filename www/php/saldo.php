<?php
	session_start();
	include ("conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	$id = 8;
	$puntos=0;
	
			 $result2 = mysql_query("SELECT id, codigo FROM usuarios WHERE id='$id'");
			 while($row2=mysql_fetch_array($result2)){
				$codigo = $row2['codigo'];
			 }
			 
			 $result2 = mysql_query("SELECT * FROM puntos WHERE usuario='$id' or usuario='$codigo'");
			 while($row2=mysql_fetch_array($result2)){
				$puntos = $puntos + $row2['puntos'];
			 }
			 echo $puntos;
?>