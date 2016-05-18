<?php
	session_start();
	include ("conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	$nombre = $_POST['c_nombre'];
	$email = $_POST['c_email'];
	$edad = $_POST['ca_edad'];
	$genero = $_POST['ca_genero'];
	$contrasena = $_POST['c_contrasena']; 
	$amigo = $_POST['c_codigo']; 
	$fecha = date("Y-m-d h:i:s");
	
function generarCodigo($longitud) {
 $key = '';
 $pattern = 'abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
	 $pasa="si";

	 $result2 = mysql_query("SELECT email FROM usuarios WHERE email='$email' LIMIT 0,1");
	 while($row2=mysql_fetch_array($result2)){
		$pasa = "no";
	 }
	
	 if($pasa=='si'){
		 $result = mysql_query("INSERT INTO usuarios (nombre, email, contrasena, sexo, edad, fecha) VALUES ('$nombre', '$email', '$contrasena', '$genero', '$edad', '$fecha')");
		 
		 $last_id = mysql_insert_id();	 
		//echo $last_id;
		 
		 $codigo1 = dechex($last_id); 
		 $codigo1 = str_pad($codigo1,4,"0",STR_PAD_LEFT);
		 $codigo = generarCodigo(3);
		 
		 $result = mysql_query("UPDATE usuarios SET codigo='$codigo$codigo1' WHERE id=$last_id");
		 
		 $result = mysql_query("INSERT INTO puntos (usuario, fecha) VALUES ('$codigo$codigo1', '$fecha')");
		 
		 if($amigo!=""){
			$result = mysql_query("INSERT INTO puntos (usuario, puntos, fecha) VALUES ('$amigo', '20', '$fecha')");
		 }
	 }
	 echo $pasa;
?>