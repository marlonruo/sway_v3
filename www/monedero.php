<?php
	session_start();
	include ("php/conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
	 
	 $id = $_SESSION["id"];
	 $puntos_tot=0;
	 $compras=0;
	
			 $result2 = mysql_query("SELECT id, codigo FROM usuarios WHERE id='$id'");
			 while($row2=mysql_fetch_array($result2)){
				$codigo = $row2['codigo'];
			 }
			 
			 $result2 = mysql_query("SELECT * FROM puntos WHERE usuario='$id' or usuario='$codigo'");
			 while($row2=mysql_fetch_array($result2)){
				$puntos_tot = $puntos_tot + $row2['puntos'];
				$compras = $compras + $row2['compras'];
			 }
			 
			 $puntos_tot = $puntos_tot - $compras;
	?>

<div class="t1" style="width:100%; text-align:center; top:15%">Selecciona la categoría que desees:</div>
            
       <div class="campos" style="left:8%; width:84%; height:8%; top:21%; ">
          <p class="crear" style="left:5%">SALDO TOTAL</p>
          <p class="crear" style="right:5%; position:absolute; text-align:right">(<span id="saldo"><?php echo $puntos_tot?></span> pts)</p>
        </div>
        
        <div id="bt_canjear" class="campos" style="left:8%; width:84%; height:8%; top:33%;">
          <p class="crear" style="left:5%">CANJEAR MIS PUNTOS</p>
          <div id="canjear" style="width:80%; height:400%; background-color:rgba(255,255,255,1.00); top:92%; position:absolute; padding-left:10%; padding-right:10%; display:none; overflow:auto; overflow-x:hidden">
          	
			 <?php 
			 $cant=0;
			 $result2 = mysql_query("SELECT * FROM promociones");
			 while($row2=mysql_fetch_array($result2)){ 
			 ?>           
             <div id="can1<?php echo $row2['id']?>" style="position:absolute; width:80%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; top:<?php echo $cant?>%"><p style="left:0%"><?php echo $row2['promocion']?> <b> <?php echo $row2['precio']?></b></p><p style="right:0%">(<span><?php echo $row2['precio']*10;?></span> pts)</p>
             <div id="ale1<?php echo $row2['id']?>" style="width:100%; height:100%; position:absolute; background-color:#fff; display:none"><span class="t1 centro_v" style="color:#212121">Puntos insuficientes</span></div>
             </div>
             
             <script>
             	$('#can1<?php echo $row2['id']?>').click(function(){
					$('#ale1<?php echo $row2['id']?>').fadeIn(500)
					$('#ale1<?php echo $row2['id']?>').delay(800).fadeOut(500)
				})
             </script>
             
             
             
             <?php
			 $cant=$cant+25;
			 }
			 ?>
          </div>
        </div>
        
        <div id="bt_movimientos" class="campos" style="left:8%; width:84%; height:8%; top:45%;">
          <p class="crear" style="left:5%">VER MIS MOVIMIENTOS</p>
          <div id="movimientos" style="width:80%; height:400%; background-color:rgba(255,255,255,1.00); top:92%; position:absolute; padding-left:10%; padding-right:10%; display:none; overflow:hidden">
          
          	 <div style="width:100%; height:76%;  position:absolute;  overflow:auto; overflow-x:hidden">
          	 <?php
			 $can=0;
              $result2 = mysql_query("SELECT * FROM puntos WHERE usuario='$id' or usuario='$codigo' ORDER BY id DESC");
			  while($row2=mysql_fetch_array($result2)){
				  $campana = $row2['campana'];
				  $puntos = $row2['puntos'];
				  $promocion = $row2['promocion'];
				  $fecha = $row2['fecha'];
				  $fecha = explode(" ", $fecha);
				  $fecha = explode("-", $fecha[0]);
				  $mes = $fecha[1];
				  if($mes==01){
					  $mes="ene";
				  }else if($mes==02){
					  $mes="feb";
				  }else if($mes==03){
					  $mes="mar";
				  }else if($mes==04){
					  $mes="abr";
				  }else if($mes==05){
					  $mes="may";
				  }else if($mes==06){
					  $mes="jun";
				  }else if($mes==07){
					  $mes="jul";
				  }else if($mes==08){
					  $mes="ago";
				  }else if($mes==09){
					  $mes="sep";
				  }else if($mes==10){
					  $mes="oct";
				  }else if($mes==11){
					  $mes="nov";
				  }else if($mes==12){
					  $mes="dic";
				  }
			 ?>
             	
                <?php 
					if($puntos!='0' && $campana!='0'){
						 $result3 = mysql_query("SELECT * FROM campana WHERE id='$campana'");
						 while($row3=mysql_fetch_array($result3)){			 
				?>
             
             <div style="position:absolute; width:80%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; top:<?php echo $can?>%"><p style="left:0%"><?php echo $row3['categoria']?> <b>+</b> <?php echo $row2['puntos']?> pts</p> <p style="right:0%"><?php echo $fecha[2]?> <?php echo $mes?> <?php echo $fecha[0]?></p></div>
             
             <?php
					 	}
			  		}else if($puntos!='0' && $campana=='0'){
			?>
            	<div style="position:absolute; width:80%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; top:<?php echo $can?>%"><p style="left:0%">Codigo a amigo <b>+</b> <?php echo $row2['puntos']?> pts</p> <p style="right:0%"><?php echo $fecha[2]?> <?php echo $mes?> <?php echo $fecha[0]?></p></div>
            
            <?php			
					}else{
						$result4 = mysql_query("SELECT * FROM promociones WHERE id='$promocion'");
						 while($row4=mysql_fetch_array($result4)){
			?>
            		 
            
            	<div style="position:absolute; width:80%; height:33%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; top:<?php echo $can?>%"><p style="left:0%"><?php echo $row4['promocion']?> <?php echo $row4['precio']?> <b>-</b> <?php echo $row2['compras']?> pts</p> <p style="right:0%"><?php echo $fecha[2]?> <?php echo $mes?> <?php echo $fecha[0]?></p></div>
            <?php		
						 }
					}
					
					
					
			 $can = $can+33;
			 }
			 ?>	
             </div>
             
            
             <div style="position:absolute; width:80%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; top:75%"><p style="left:0%"><b>Saldo Total</b></p><p style="right:0%"><?php echo $puntos_tot?> pts</p></div>	
          </div>
          
          
        </div>
        
        <div id="bt_alta" class="campos" style="left:8%; width:84%; height:8%; top:57%;">
          <p class="crear" style="left:5%">DAR DE ALTA CUENTA</p>
          <div id="alta" style="width:100%; height:400%; top:92%; position:absolute; display:none; overflow:auto; overflow-x:hidden">
       	     <?php
             $result4 = mysql_query("SELECT * FROM servicios WHERE usuario='$id'");
			 while($row4=mysql_fetch_array($result4)){
			 ?>
             
             <?php if($row4['servicio']==1){?>
             
             <div style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFFFF"><p style="left:10%">Telcel<div style="right:10%; position:absolute; width:50%; background-image:url(imagenes/telcel.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div>
          	 </div>
             
             <?php }?>
             <?php if($row4['servicio']==2){?>
            <div style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFFFF;"><p style="left:10%">CFE<div style="right:10%; position:absolute; width:50%; background-image:url(imagenes/cfe.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>	
             <?php }?>
             <?php if($row4['servicio']==3){?>
             <div style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFFFF;"><p style="left:10%">Itunes</p><div style="right:10%; position:absolute; width:50%; background-image:url(imagenes/itunes.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>
             <?php }?>
             <?php if($row4['servicio']==4){?>
             <div style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFFFF;"><p style="left:10%">Spotify</p><div style="right:10%; position:absolute; width:50%; background-image:url(imagenes/spotify.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>
             <?php }?>
             <?php if($row4['servicio']==5){?>
             <div style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFFFF"><p style="left:10%; width:50%">Amazon</p><div style="right:10%; position:absolute; width:50%; background-image:url(imagenes/amazon.png); height:100%; background-repeat:no-repeat; background-position:right; background-size:auto 50%"></div></div>
             
             <?php 
			 }
			 }
			 ?>
             <div id="bt_agrega" style="position:relative; float:left; width:100%; height:25%; border-bottom:1px solid rgba(217,217,217,1.00); color:#000000; background-color:#FFFDFD;"><p style="left:10%">-</p><p style="right:10%; text-align:right; color:#C7004B; font-size:14px"><b>Agregar +</b></p></div>
          </div>
        </div>
        
        <script>
		
		$('#bt_agrega').click(function(){
		  $('#gal_che').hide()
		  $('#gal_im').show()
		   
		  

		 $('#monedero').css('z-index', '0')

		 
		 $('#atras').fadeIn()
		 $('#alerta, #alerta2').fadeOut()
		 $('#atras').css('right','20%')
		 
		 $('#cuenta').show()
		 $('#cuenta').css('margin-left', '100%')
		 $('#cuenta').animate({marginLeft:'0%'}, 500)
		 at=8
		 $('#titulo_seccion').html('Agregar cuenta')
      })
		
		
        $('#bt_canjear').click(function(){
			$('#alta').fadeOut(200)
			$('#movimientos').fadeOut(200)
			$('#canjear').delay(200).fadeIn(500)
			$('#bt_movimientos').animate({top:'76%'}, 500)
			$('#bt_alta').animate({top:'88%'}, 500)
		})
		
		$('#bt_movimientos').click(function(){
			$('#alta').fadeOut(200)
			$('#canjear').fadeOut(200)
			$('#movimientos').delay(200).fadeIn(500)
			$('#bt_movimientos').animate({top:'45%'}, 500)
			$('#bt_alta').animate({top:'88%'}, 500)
		})
		
		$('#bt_alta').click(function(){
			$('#movimientos').fadeOut(200)
			$('#canjear').fadeOut(200)
			$('#alta').delay(200).fadeIn(500)
			$('#bt_movimientos').animate({top:'45%'}, 500)
			$('#bt_alta').animate({top:'57%'}, 500)
		})
        </script>