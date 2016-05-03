/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
		
		// onSuccess Callback
// This method accepts a Position object, which contains the
// current GPS coordinates
//
		// onSuccess Callback
//   This method accepts a `Position` object, which contains
//   the current GPS coordinates
//

function onSuccess(position) {
	//$('#no_local').hide()
	var cordenadas = position.coords.latitude+", "+position.coords.longitude				
		
		navigator.geolocation.clearWatch(watchID);
		
		//localStorage.setItem("latitud", position.coords.latitude);
		//localStorage.setItem("longitude", position.coords.longitude);
		
		document.getElementById('latlng').value = position.coords.latitude+', '+position.coords.longitude
		
		//lati = position.coords.latitude
		//long = position.coords.longitude
		/*$('#ubi').css('font-size','10px')
		$('#ubi').html(lat+','+lon+'<br>'+document.getElementById('ubi').innerHTML)*/
}

// onError Callback receives a PositionError object
//
function onError(error) {				
    //$('#no_local').show()
	//countr = 'mexico'
}

// Options: throw an error if no update is received every 30 seconds.
//
var watchID = navigator.geolocation.watchPosition(onSuccess, onError, { enableHighAccuracy: true});

//frequency:10000, maximumAge: 10000,

    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
 
};



$(document).ready(function(){
            setTimeout(function(){
                navigator.splashscreen.hide();
           },1500);
        });