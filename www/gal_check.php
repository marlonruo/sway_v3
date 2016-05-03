<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.2.js" type="text/javascript"></script>
<script src="js/jquery.mobile.custom.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>
</head>

<body onLoad="inicio()">

<div style="position:absolute; height:100%; width:100%; overflow:hidden; background-image:url(imagenes/verde.png); background-size:100% 100%">		
        
        <div class="t1" style="width:100%; text-align:center; top:5%; font-size:13px">¡Comparte tu ubicación al instante!</div>
           
          
            
        <div id="submit" class="campos" style="left:8%; width:84%; height:8%; top:11%; background:url(imagenes/ubi.png) no-repeat; background-size:auto 60%; background-position:95%">
          <p class="crear" style="left:5%">OBTÉN TU UBICACIÓN</p>
          <input id="latlng" type="text" value="19.714224,-99.961452" style="display:none"> 
        </div>
        
        <div class="campos" style="left:8%; width:64%; height:8%; top:23%;">
            <p id="t_lugar" class="crear" style="margin-left:5%">NOMBRE DEL LUGAR</p>
            <input id="address" placeholder="" class="campo_texto" onFocus="borrar_nom()" onBlur="revisar_nom()" type="text"></input>  
        </div>
        
        <div id="buscar" style="width:14%; height:8%; cursor:pointer; position:absolute; left:78%; top:23%; background:url(imagenes/lupa.png) no-repeat; background-position:center; background-size:auto 40%"></div>

        
        
        <div id="map2" style="position:absolute; top:35%; width:84%; left:8%; height:42%;"></div>
        
        
    <script>
	
		    function borrar_nom(){
				$('#t_lugar').html('')
			}
			function revisar_nom(){
				if(document.getElementById('address').value==""){
					$('#t_lugar').html('NOMBRE DEL LUGAR')
				}
			}
	
	
	  $('#submit').on( "vmousedown", function() {
		  $(this).css('background', 'url(imagenes/bt_rosa.png) no-repeat')
		  $(this).css('background-size', '100% 100%')
	  });
	  
	  $('#submit').on( "vmouseup", function() {
		  $(this).css('background', 'url(imagenes/ubi.png) no-repeat')
		  $(this).css('background-size', 'auto 60%')
		  $(this).css('background-position', '95%')
	  });
	  
	  $('#buscar').on( "vmousedown", function() {
		  $(this).css('background', 'url(imagenes/bt_rosa.png) no-repeat')
		  $(this).css('background-size', '100% 100%')
	  });
	  
	  $('#buscar').on( "vmouseup", function() {
		  $(this).css('background', 'url(imagenes/lupa.png) no-repeat')
		  $(this).css('background-size', 'auto 40%')
		  $(this).css('background-position', 'center')
	  });
	
	  var placeSearch, autocomplete;
      function initAutocomplete() {
        	autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('address')),
            {types: ['geocode']});
        	autocomplete.addListener('place_changed', fillInAddress);
      }
	
	
	
function initMap() {
  var map = new google.maps.Map(document.getElementById('map2'), {
    zoom: 14,
    center: {lat: 19.3910038, lng: -99.2837008}
  });
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  
  initAutocomplete()

  document.getElementById('buscar').addEventListener('click', function() {
       geocodeAddress(geocoder, map);
  });
  
  
  var image = 'imagenes/wi-fi.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: 19.3910038, lng: -99.2837008},
    map: map,
    icon: image
  });
  
  
  google.maps.event.addListener(beachMarker,'click',function(){
          mapa_centro()
  });
  
  
  function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('No hay resultados');
          }
        });
      }
  

  document.getElementById('submit').addEventListener('click', function() {
    geocodeLatLng(geocoder, map, infowindow);
  });
  
  document.getElementById('map_obten').addEventListener('click', function() {
    geocodeLatLng(geocoder, map, infowindow);
	$('#mapas').css('z-index', '1')
    $('#ubicacion').css('z-index', '2')
			 //$('#retroalimentacion').css('z-index', '0')
			 //$('#log').css('z-index', '0')
			 //$('#login').css('z-index', '0')
			 
			 $('#atras').fadeOut()
			 $('#alerta').fadeIn()
			 $('#atras').css('right','19%')
			 
			 $('#ubicacion').show()
			 $('#ubicacion').css('margin-left', '100%')
			 $('#ubicacion').animate({marginLeft:'0%'}, 500)
			 at=0
  });
  
  
}

function geocodeLatLng(geocoder, map, infowindow) {
  var input = document.getElementById('latlng').value;
  var latlngStr = input.split(',', 2);
  var myLatLng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
	
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: myLatLng
  });
  
  var imageb = 'imagenes/wi-fi.png';
  var beachMarkerb = new google.maps.Marker({
    position: {lat: 19.3910038, lng: -99.2837008},
    map: map,
    icon: imageb
  });
  
  google.maps.event.addListener(beachMarkerb,'click',function(){
          mapa_centro()
  });
  
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    //title: 'Hello World!'
  });
  
  
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap&signed_in=true&libraries=places"
        async defer></script>    
        
    
        
        
        
        <div class="t1" style="width:100%; text-align:center; top:82%; font-size:13px">- compártela con tu amigos -</div>
        
        <div class="botones" style="left:8%; width:84%; height:8%; top:88%; background:url(imagenes/bt_face.png) no-repeat; background-size:100% 100%; border:none">
   	    	<img src="imagenes/face.png" style="top:10%; height:80%; position:absolute; left:5%"/>
            <p class="red" style="width:80%; text-align:left; left:20%">Compartir en Facebook</p>
        </div>
    

</div>




</body>
</html>