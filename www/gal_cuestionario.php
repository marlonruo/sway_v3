
<div style="position:absolute; height:100%; width:100%; overflow:hidden; background:url(imagenes/azul.png) no-repeat; background-size:100% 100%">
	  	<div class="t1" style="width:90%; left:10%; text-align:left; top:5%">La pregunta abierta formulada:</div>
            
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:11%; ba">
        	<p id="t_nombre" class="crear" style="margin-left:5%">Respuesta 1</p>
        </div>
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:23%">
        	<p id="t_email" class="crear" style="margin-left:5%">Respuesta 2</p>
        </div>
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:35%">
        	<p id="t_email" class="crear" style="margin-left:5%">Respuesta 3</p>
        </div>
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:47%">
        	<p id="t_email" class="crear" style="margin-left:5%">Respuesta 4</p>
        </div>
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:59%">
        	<p id="t_email" class="crear" style="margin-left:5%">Respuesta 5</p>
        </div>
        
        <div id="bt_signup" class="botones" style="left:8%; width:84%; height:8%; top:71%; cursor:pointer; background:url(imagenes/bt_rosa.png) no-repeat; background-size:100% 100%; border:2px solid #FFFFFF">
       	  <p class="bot" style="width:100%; text-align:center">Regresar</p>
        </div>
        
        <script>
        	$('.bots').mousedown(function(){
				$(this).css('background', 'url(imagenes/bt_rosa.png)')
			})
			$('.bots').mouseup(function(){
				$(this).css('background', 'none')
			})
        </script>
</div>

