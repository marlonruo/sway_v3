
<div style="position:absolute; height:100%; width:100%; overflow:hidden; background:url(imagenes/azul.png) no-repeat; background-size:100% 100%">
	  	<div class="t1" style="width:90%; left:10%; text-align:left; top:5%">La pregunta Cerrada formulada:</div>
            
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:11%; ba">
        	<p id="t_nombre" class="crear" style="margin-left:5%">Si</p>
        </div>
        <div class="campos bots" style="left:8%; width:84%; height:8%; top:23%">
        	<p id="t_email" class="crear" style="margin-left:5%">No</p>
        </div>
        
        <div class="t1" style="width:100%; margin-top:70%; text-align:center; position:relative; float:left">
Recuerda que sólo puedes<br>
votar 1 vez por semana en la misma<br>
campaña publicitaria</div>
        
        
        <script>
        	$('.bots').mousedown(function(){
				$(this).css('background', 'url(imagenes/bt_rosa.png)')
			})
			$('.bots').mouseup(function(){
				$(this).css('background', 'none')
			})
        </script>
</div>

