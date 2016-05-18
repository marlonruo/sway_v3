<?php
session_start();
	include ("php/conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	  $id = $_SESSION["id"];
	
			 
?>

<div class="t1" style="width:100%; text-align:center; top:14%">Mi cuenta</div>
            
           <?php $result2 = mysql_query("SELECT * FROM usuarios WHERE id='$id'");
			 while($row2=mysql_fetch_array($result2)){
            ?>
        <div id="lo_1" class="campos" style="left:8%; width:84%; height:8%; top:20%;background:url(imagenes/edi.png) no-repeat; background-size:auto 60%; background-position:94%">
          <p class="crear" style="left:5%">Nombre: <span id="el_nombre"><?php echo $row2['nombre']?></span></p>
        </div>
        
        <div id="lo_2" class="campos" style="left:8%; width:84%; height:8%; top:31%;">
          <p class="crear" style="left:5%">Email: <span id="el_email"><?php echo $row2['email']?></span></p>
        </div>
        
        <div id="lo_3" class="campos" style="left:8%; width:84%; height:8%; top:42%;">
          <p class="crear" style="left:5%">Tel: <span id="el_telefono"><?php echo $row2['telefono']?></span></p>
        </div>
        
        <div id="lo_4" class="campos" style="left:8%; width:84%; height:8%; top:53%;">
          <p class="crear" style="left:5%">Cuentas vinculadas</p>
          	<div id="alta2" style="width:80%; height:300%; background-color:rgba(255,255,255,1.00); top:92%; position:absolute; padding-left:10%; padding-right:10%; display:none; overflow:auto; overflow-x:hidden; z-index:1000">
       	    <div style="position:relative; float:left; width:100%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000"><p style="left:0%">Amazon<div style="right:0%; position:absolute; width:50%; background-image:url(imagenes/amazon.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div>
          	 </div>
             <div style="position:relative; float:left; width:100%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000;"><p style="left:0%">CFE<div style="right:0%; position:absolute; width:50%; background-image:url(imagenes/cfe.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>	
             <div style="position:relative; float:left; width:100%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000;"><p style="left:0%">Itunes</p><div style="right:0%; position:absolute; width:50%; background-image:url(imagenes/itunes.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>

          </div>
        </div>
        <div id="lo_5" class="campos" style="left:8%; width:84%; height:8%; top:64%;">
          <p class="crear" style="left:5%">CERRAR SESIÓN</p>
        </div>
        
        <?php
			 }
		?>
        
        
        <script>
		  $('#lo_4').on( "vmousedown", function() {
			  $(this).css('background', 'url(imagenes/bt_rosa.png) no-repeat')
			  $(this).css('background-size', '100% 100%')
			  $('#lo_5').animate({top:'87%'}, 400)
			  $('#alta2').delay(300).fadeIn(400)
		  })
		  
		  $('#lo_1, #lo_2, #lo_3, #lo_5').on( "vmousedown", function() {
			  $(this).css('background', 'url(imagenes/bt_rosa.png) no-repeat')
			  $(this).css('background-size', '100% 100%')
			  $('#lo_4').css('background', 'none')
			  $('#lo_5').delay(300).animate({top:'64%'}, 400)
			  $('#alta2').fadeOut(400)
		  })
		   $('#lo_2, #lo_3, #lo_5').on( "vmouseup", function() {
			 $(this).css('background', 'none')
		  })
		  
		  $('#lo_1').on( "vmouseup", function() {
			 $(this).css('background', 'url(imagenes/edi.png) no-repeat')
			 $(this).css('background-position', '94%')
			 $(this).css('background-size', 'auto 60%')
		  })
		  
		  
		  $('#lo_1').click(function(){
			 $('#lo_nombre').html(document.getElementById('el_nombre').innerHTML)
			 $('#lo_email').html(document.getElementById('el_email').innerHTML)
			 $('#lo_telefono').html(document.getElementById('el_telefono').innerHTML)
			 $('#editar').show()
			 $('#editar').css('z-index', '1')
			 $('#localizador').css('z-index', '0')
			 $('#editar').css('margin-left', '100%')
			 $('#editar').animate({marginLeft:'0%'}, 500)
			 $('#atras').fadeIn()
			 $('#alerta, #alerta2').fadeOut()
			 $('#atras').css('right','20%')
			 $('#titulo_seccion').html('Editar Perfil')
			 at=7
		   });
        
		</script>