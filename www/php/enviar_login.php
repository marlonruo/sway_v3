<?php
	session_start();
	include ("conexion.php");
	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	$email = $_POST['c_email2'];
	$contrasena = $_POST['c_contrasena2']; 

	$result3 = mysql_query("SELECT * FROM usuarios WHERE email='$email' and contrasena='$contrasena'");
		$cant = 0;

        while($row3=mysql_fetch_array($result3)){
            $cant++;
			$id = $row3['id'];
        }

		if($cant==0){
			echo "no";
		}else{
			echo $id;
			$_SESSION["id"]=$id;
		}
?>