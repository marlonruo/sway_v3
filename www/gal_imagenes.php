<?php
	include ("php/conexion.php");

	 $connect = mysql_connect("$host", "$user", "$pass");
     mysql_select_db("$db", $connect);
?>
<script>
var pos=1;
</script>

			<div style="position:absolute; height:100%; width:100%; overflow:hidden;">
            
            
            
             <?php
			   $cant=0;
               $result = mysql_query("SELECT * FROM campana WHERE tipo='imagenes' LIMIT 0,20");
               while($row=mysql_fetch_array($result)){
				   $cant++;
				   if($cant==1){
			   ?>
            
           	<div id="im<?php echo $row['id']?>" style="position:absolute; width:100%; height:100%; background-image:url(imagenes/verde.png); background-size:100% 100%;">
            
               <?php
				   }else{
			   ?>
               
               <div id="im<?php echo $row['id']?>" style="position:absolute; width:100%; height:100%; background-image:url(imagenes/verde.png); background-size:100% 100%; left:100%; display:none">
               
               <?php
				   }
			   ?>
            
	  		<div class="t1" style="width:100%; height:85%; text-align:left; color:#fff; font-size:18px; line-height:18px; top:0%; overflow:auto; overflow-x:hidden">
            
			  
				
	  		<img src="imagenes/galeria/<?php echo $row['imagen']?>" width="100%" style="position:absolute"/>    
               
            </div>
            
            
             <div class="estrellas" style="width:100%; position:fixed; top:85%; background-color:#fff; height:15%">
            	<div class="centro_v" style="position:absolute; width:100%;">
       	    		<img id="ee1a<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella2.png" style="position:absolute; left:10%; height:10px; opacity:0; cursor:pointer"/>
                    <img id="ee2a<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella2.png" style="position:absolute; left:28%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee3a<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella2.png" style="position:absolute; left:46%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee4a<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella2.png" style="position:absolute; left:64%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee5a<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella2.png" style="position:absolute; left:82%; height:10px; cursor:pointer"/>
                    
                    <img id="ee1<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella.png" style="position:absolute; left:10%; height:10px; cursor:pointer"/>
                    <img id="ee2<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella.png" style="position:absolute; left:28%; height:10px; cursor:pointer"/> 
                    <img id="ee3<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella.png" style="position:absolute; left:46%; height:10px; cursor:pointer"/> 
                    <img id="ee4<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella.png" style="position:absolute; left:64%; height:10px; cursor:pointer"/> 
                    <img id="ee5<?php echo $row['id']?>" class="es2 centro_v" src="imagenes/estrella.png" style="position:absolute; left:82%; height:10px; cursor:pointer; opacity:0"/>  
                </div>
                
                <div class="bloquea1" style="position:absolute; width:100%; height:100%; display:none"></div>
                
                <script>
					$('#puntos').animate({opacity:'0'},0)
					$('#ya').animate({opacity:'0'},0)
					
					$('#ee1<?php echo $row['id']?>, #ee2<?php echo $row['id']?>, #ee3<?php echo $row['id']?>, #ee4<?php echo $row['id']?>, #ee5<?php echo $row['id']?>').mouseup(function(){
						
						
						
					$.ajax({
						type: "POST",
						url: "php/addpuntos.php?id="+ida+"&campana=<?php echo $row['id']?>",
						data: { "codigo" :  "codigo" },
						success: function(data){
							if(data=='no'){
								$('#ya').animate({opacity:'1'},500, 'linear')
								$('#ya').delay(500).animate({opacity:'0'},500, 'linear')
								pasa2()
								$('.bloquea1').show()
							}else{
								$('#puntos').animate({opacity:'1'},500, 'linear')
								$('#puntos').animate({opacity:'0'},500, 'linear')
								pasa()
								$('.bloquea1').show()		
							}
							
						}
					});
						
						

					function pasa(){
								if(pos==1){
									pos=2
									$('#im1').delay(600).animate({left:'-100%'},800)
									$('#im2').css('left', '100%')
									$('#im2').show()
									$('#im2').delay(600).animate({left:'-0%'},800)
								}else if(pos==2){
									pos=3
									$('#im2').delay(600).animate({left:'-100%'},800)
									$('#im3').css('left', '100%')
									$('#im3').show()
									$('#im3').delay(600).animate({left:'-0%'},800)
								}else if(pos==3){
									pos=1
									$('#im3').delay(600).animate({left:'-100%'},800)
									$('#im1').css('left', '100%')
									$('#im1').show()
									$('#im1').delay(600).animate({left:'-0%'},800)
								}
								$('.bloquea1').delay(1200).fadeOut(0)
					}
					
					function pasa2(){
								if(pos==1){
									pos=2
									$('#im1').delay(1600).animate({left:'-100%'},800)
									$('#im2').css('left', '100%')
									$('#im2').show()
									$('#im2').delay(1600).animate({left:'-0%'},800)
								}else if(pos==2){
									pos=3
									$('#im2').delay(1600).animate({left:'-100%'},800)
									$('#im3').css('left', '100%')
									$('#im3').show()
									$('#im3').delay(1600).animate({left:'-0%'},800)
								}else if(pos==3){
									pos=1
									$('#im3').delay(1600).animate({left:'-100%'},800)
									$('#im1').css('left', '100%')
									$('#im1').show()
									$('#im1').delay(1600).animate({left:'-0%'},800)
								}
								$('.bloquea1').delay(2000).fadeOut(0)
					}
						
						
						
						
					});
                	$('#ee1<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5<?php echo $row['id']?>').css('opacity', '0')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '1')
					})
					$('#ee1<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5<?php echo $row['id']?>').css('opacity', '0')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '1')
					})
					$('#ee2<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5<?php echo $row['id']?>').css('opacity', '0')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '1')
					})
					$('#ee3<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5<?php echo $row['id']?>').css('opacity', '0')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '1')
					})
					$('#ee4<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5<?php echo $row['id']?>').css('opacity', '0')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '1')
					})
					$('#ee5<?php echo $row['id']?>').mouseover(function(){
						$('#ee1<?php echo $row['id']?>').css('opacity', '1')
						$('#ee2<?php echo $row['id']?>').css('opacity', '1')
						$('#ee3<?php echo $row['id']?>').css('opacity', '1')
						$('#ee4<?php echo $row['id']?>').css('opacity', '1')
						$('#ee5<?php echo $row['id']?>').css('opacity', '1')
						$('#ee1a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee2a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee3a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee4a<?php echo $row['id']?>').css('opacity', '0')
						$('#ee5a<?php echo $row['id']?>').css('opacity', '0')
					})	
                </script>
            </div>
            
            
            </div>
            
            <?php 
			}
			?>
            
            <div id="ya" class="centrar2" style="font-size:30px; color:#FFFFFF; width:100%; text-align:center">Ya has votado<br>por esta campaña</div>
            <div id="puntos" class="centrar" style="font-size:50px; color:#FFFFFF">+ 10 pts</div>
            </div>

