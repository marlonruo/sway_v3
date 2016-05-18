<?php
	session_start();
	include ("conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	$id = $_SESSION["id"];
	

	 $result2 = mysql_query("SELECT codigo FROM usuarios WHERE id='$id'");
	 while($row2=mysql_fetch_array($result2)){
		echo $row2['codigo'];
	 }
			
			

?>