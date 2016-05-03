			<div style="position:absolute; height:100%; width:100%; overflow:hidden;">
           	<div style="position:absolute; width:100%; height:85%; background-image:url(imagenes/verde.png); background-size:100% 100%; overflow:auto; overflow-x:hidden">
	  		<div class="t1" style="width:100%; text-align:left; color:#fff; font-size:18px; line-height:18px; top:0%">
            
  
	  		<img id="im1" src="imagenes/galeria/fuze.png" width="100%" style="position:absolute"/>
            
            <img id="im2" src="imagenes/galeria/pepsi.jpg" width="100%" style="position:absolute; left:100%; display:none"/>
            
            <img id="im3" src="imagenes/galeria/adidas.jpg" width="100%" style="position:absolute; left:100%; display:none"/>
            
            </div>
            </div>
            
            
            <div class="estrellas" style="height:15%; width:100%; position:absolute; top:85%; background-color:#FFFFFF">
            	<div class="centro_v" style="position:absolute; width:100%;">
       	    		<img id="ee1a" class="es2" src="imagenes/estrella2.png" style="position:absolute; left:10%; height:10px; opacity:0; cursor:pointer"/>
                    <img id="ee2a" class="es2" src="imagenes/estrella2.png" style="position:absolute; left:28%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee3a" class="es2" src="imagenes/estrella2.png" style="position:absolute; left:46%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee4a" class="es2" src="imagenes/estrella2.png" style="position:absolute; left:64%; height:10px; opacity:0; cursor:pointer"/> 
                    <img id="ee5a" class="es2" src="imagenes/estrella2.png" style="position:absolute; left:82%; height:10px; cursor:pointer"/>
                    
                    <img id="ee1" class="es2" src="imagenes/estrella.png" style="position:absolute; left:10%; height:10px; cursor:pointer"/>
                    <img id="ee2" class="es2" src="imagenes/estrella.png" style="position:absolute; left:28%; height:10px; cursor:pointer"/> 
                    <img id="ee3" class="es2" src="imagenes/estrella.png" style="position:absolute; left:46%; height:10px; cursor:pointer"/> 
                    <img id="ee4" class="es2" src="imagenes/estrella.png" style="position:absolute; left:64%; height:10px; cursor:pointer"/> 
                    <img id="ee5" class="es2" src="imagenes/estrella.png" style="position:absolute; left:82%; height:10px; cursor:pointer; opacity:0"/>  
                </div>
                
                <script>
					var pos=1
					$('#ee1, #ee2, #ee3, #ee4, #ee5').mouseup(function(){
						if(pos==1){
							pos=2
							$('#im1').delay(300).animate({left:'-100%'},800)
							$('#im2').css('left', '100%')
							$('#im2').show()
							$('#im2').delay(300).animate({left:'-0%'},800)
						}else if(pos==2){
							pos=3
							$('#im2').delay(300).animate({left:'-100%'},800)
							$('#im3').css('left', '100%')
							$('#im3').show()
							$('#im3').delay(300).animate({left:'-0%'},800)
						}else if(pos==3){
							pos=1
							$('#im3').delay(300).animate({left:'-100%'},800)
							$('#im1').css('left', '100%')
							$('#im1').show()
							$('#im1').delay(300).animate({left:'-0%'},800)
						}
					});
                	$('#ee1').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '0')
						$('#ee3').css('opacity', '0')
						$('#ee4').css('opacity', '0')
						$('#ee5').css('opacity', '0')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '1')
						$('#ee3a').css('opacity', '1')
						$('#ee4a').css('opacity', '1')
						$('#ee5a').css('opacity', '1')
					})
					$('#ee1').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '0')
						$('#ee3').css('opacity', '0')
						$('#ee4').css('opacity', '0')
						$('#ee5').css('opacity', '0')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '1')
						$('#ee3a').css('opacity', '1')
						$('#ee4a').css('opacity', '1')
						$('#ee5a').css('opacity', '1')
					})
					$('#ee2').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '1')
						$('#ee3').css('opacity', '0')
						$('#ee4').css('opacity', '0')
						$('#ee5').css('opacity', '0')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '0')
						$('#ee3a').css('opacity', '1')
						$('#ee4a').css('opacity', '1')
						$('#ee5a').css('opacity', '1')
					})
					$('#ee3').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '1')
						$('#ee3').css('opacity', '1')
						$('#ee4').css('opacity', '0')
						$('#ee5').css('opacity', '0')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '0')
						$('#ee3a').css('opacity', '0')
						$('#ee4a').css('opacity', '1')
						$('#ee5a').css('opacity', '1')
					})
					$('#ee4').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '1')
						$('#ee3').css('opacity', '1')
						$('#ee4').css('opacity', '1')
						$('#ee5').css('opacity', '0')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '0')
						$('#ee3a').css('opacity', '0')
						$('#ee4a').css('opacity', '0')
						$('#ee5a').css('opacity', '1')
					})
					$('#ee5').mouseover(function(){
						$('#ee1').css('opacity', '1')
						$('#ee2').css('opacity', '1')
						$('#ee3').css('opacity', '1')
						$('#ee4').css('opacity', '1')
						$('#ee5').css('opacity', '1')
						$('#ee1a').css('opacity', '0')
						$('#ee2a').css('opacity', '0')
						$('#ee3a').css('opacity', '0')
						$('#ee4a').css('opacity', '0')
						$('#ee5a').css('opacity', '0')
					})	
                </script>
            </div>
            </div>

