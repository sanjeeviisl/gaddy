jQuery(document).ready(function($) {
    'use strict';
    var routeSelect = document.getElementById('routeSelect');
    var map = document.getElementById('map-canvas');
    var autoRefresh = false;
    var intervalID = 0;
    var sessionIDArray = [];
	var markerArray = [];
    var viewingAllVehicles = false;
	var step = 0.00100;
	var step_latitude = 28.6126930;
	var step_longitude = 77.3593670;

	var gpsTrackerMap;
	var googleMapsLayer;
	var movingMarker;
	var tracker_latitude = 0.0;
	var tracker_longitude = 0.0;

	var latitude = 0.0;
	var longitude = 0.0;
	
	Window.map = new L.Map('map-canvas');

    getAllVehiclesForMap();
    //loadVehiclesIntoDropdownBox();
	loadRoutesIntoDropdownBox();
    
    $("#routeSelect").change(function() {
        if (hasMap()) {
            viewingAllVehicles = false;
            getvehicleForMap();
        } 
    });
       
    $("#refresh").click(function() {
        if (viewingAllVehicles) {
            getAllVehiclesForMap(); 
        } else {
            if (hasMap()) {
                getvehicleForMap();
            }             
        }
    });
       
    $("#delete").click(function() {
        deleteVehicle();
    });       
        
    $('#autorefresh').click(function() { 
        if (autoRefresh) {
            turnOffAutoRefresh();           
        } else {
            turnOnAutoRefresh();                     
        }
    }); 
    
    $("#viewall").click(function() {
		viewingAllVehicles = true;
        getAllVehiclesForMap();
    });
        
//// Initialize Function
		
    function getAllVehiclesForMap() {
        viewingAllVehicles = true;
        routeSelect.selectedIndex = 0;
        showPermanentMessage('Please select a vehicle below');           
        $.ajax({
            url: 'getallroutesformap.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                loadGPSLocations(data);
        },
        error: function (xhr, status, errorThrown) {
            console.log("error status: " + xhr.status);
            console.log("errorThrown: " + errorThrown);
        }
        });
    }           

		
    function loadGPSLocations(json) {
        // console.log(JSON.stringify(json));
        
        if (json.length == 0) {
            showPermanentMessage('There is no tracking data to view');
            map.innerHTML = '';
        }
        else {
            if (map.id == 'map-canvas') {
                // clear any old map objects
                document.getElementById('map-canvas').outerHTML = "<div id='map-canvas'></div>";
           
                // use leaflet (http://leafletjs.com/) to create our map and map layers
                gpsTrackerMap = new L.map('map-canvas');
                googleMapsLayer = new L.Google('ROADMAP');
            
                L.polyline([[0, 0], ]).addTo(gpsTrackerMap);

                // this sets which map layer will first be displayed
                gpsTrackerMap.addLayer(googleMapsLayer);

                // this is the switcher control to switch between map types
                gpsTrackerMap.addControl(new L.Control.Layers({
                    'Google Maps':googleMapsLayer
                }, {}));
            }

                var finalLocation = false;
                var counter = 0;
                var locationArray = [];
                
                // iterate through the locations and create map markers for each location
                $(json.locations).each(function(key, value){
                    var latitude =  $(this).attr('latitude');
                    var longitude = $(this).attr('longitude');
                    var tempLocation = new L.LatLng(latitude, longitude);
                    
                    locationArray.push(tempLocation);                    
                    counter++;

                    // want to set the map center on the last location
                    if (counter == $(json.locations).length) {
                        //gpsTrackerMap.setView(tempLocation, zoom);  if using fixed zoom
                        finalLocation = true;
                    
                        if (!viewingAllVehicles) {
                            displayCityName(latitude, longitude);
                        }
                    }

					markerArray = [];
					
                    var marker = createMarker(
                        latitude,
                        longitude,
                        $(this).attr('speed'),
                        $(this).attr('direction'),
                        $(this).attr('distance'),
                        $(this).attr('locationMethod'),
                        $(this).attr('gpsTime'),
                        $(this).attr('userName'),
                        $(this).attr('sessionID'),
                        $(this).attr('accuracy'),
                        $(this).attr('extraInfo'),
                        gpsTrackerMap, finalLocation);
                });
                
//				markerArray.push(marker);      
				
                // fit markers within window
                var bounds = new L.LatLngBounds(locationArray);
                gpsTrackerMap.fitBounds(bounds);
            }
    }

	
	
    function loadVehiclesIntoDropdownBox() {      
        $.ajax({
            url: 'getroutes.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
            loadVehicles(data);
        },
        error: function (xhr, status, errorThrown) {
            console.log("status: " + xhr.status);
            console.log("errorThrown: " + errorThrown);
        }
        });
    }    
    
    function loadVehicles(json) {        
        if (json.length == 0) {
            showPermanentMessage('There are no Vehicles available to view');
        }
        else {
            // create the first option of the dropdown box
            var option = document.createElement('option');
            option.setAttribute('value', '0');
            option.innerHTML = 'Select vehicle...';
            routeSelect.appendChild(option);

            // when a user taps on a marker, the position of the sessionID in this array is the position of the vehicle
            // in the dropdown box. it's used below to set the index of the dropdown box when the map is changed
            sessionIDArray = [];
            
            // iterate through the Vehicles and load them into the dropdwon box.
            $(json.Vehicles).each(function(key, value){
                var option = document.createElement('option');
                option.setAttribute('value', '?sessionid=' + $(this).attr('sessionID'));

                sessionIDArray.push($(this).attr('sessionID'));

                option.innerHTML = $(this).attr('userName') + " " + $(this).attr('times');
                routeSelect.appendChild(option);
            });

            // need to reset this for firefox
            routeSelect.selectedIndex = 0;

            showPermanentMessage('Please select a vehicle below');
        }
    }
		
		
	function loadRoutesIntoDropdownBox() {      
        $.ajax({
            url: 'getroutes.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
            loadRoutes(data);
        },
        error: function (xhr, status, errorThrown) {
            console.log("status: " + xhr.status);
            console.log("errorThrown: " + errorThrown);
        }
        });
    }    
    
    function loadRoutes(json) {        
        if (json.length == 0) {
            showPermanentMessage('There are no routes available to view');
        }
        else {
            // create the first option of the dropdown box
            var option = document.createElement('option');
            option.setAttribute('value', '0');
            option.innerHTML = 'Select Vehicle...';
            routeSelect.appendChild(option);

            // when a user taps on a marker, the position of the sessionID in this array is the position of the route
            // in the dropdown box. it's used below to set the index of the dropdown box when the map is changed
            sessionIDArray = [];
            
            // iterate through the routes and load them into the dropdwon box.
            $(json.routes).each(function(key, value){
                var option = document.createElement('option');
                option.setAttribute('value', '?sessionid=' + $(this).attr('sessionID'));

                sessionIDArray.push($(this).attr('sessionID'));

                option.innerHTML = $(this).attr('userName') + " " + $(this).attr('times');
                routeSelect.appendChild(option);
            });

            // need to reset this for firefox
            routeSelect.selectedIndex = 0;

            showPermanentMessage('Please select a Vehicle below');
        }
    }

/////////// Helper Functions
    function createMarker(latitude, longitude, speed, direction, distance, locationMethod, gpsTime,
                          userName, sessionID, accuracy, extraInfo, map, finalLocation) {
        var iconUrl;

        if (finalLocation) {
            iconUrl = 'http://gaddy.in/control_panel/mapview/images/coolred_small.png';
        } else {
            iconUrl = 'http://gaddy.in/control_panel/mapview/images/coolgreen2_small.png';
        }

        var markerIcon = new L.Icon({
                iconUrl:      iconUrl,
                shadowUrl:    'http://gaddy.in/control_panel/mapview/images/coolshadow_small.png',
                iconSize:     [22, 20],
                shadowSize:   [22, 20],
                iconAnchor:   [6, 20],
                shadowAnchor: [6, 20],
                popupAnchor:  [-3, -25]
        });

        var lastMarker = "</td></tr>";

        // when a user clicks on last marker, let them know it's final one
        if (finalLocation) {
            lastMarker = "</td></tr><tr><td align=left>&nbsp;</td><td><b>Final location</b></td></tr>";
        }

        var popupWindowText = "<table border=0 style=\"font-size:95%;font-family:arial,helvetica,sans-serif;color:#000;\">" +
            "<tr><td align=right>&nbsp;</td><td>&nbsp;</td><td rowspan=2 align=right>" +
            "<img src=http://gaddy.in/control_panel/mapview/images/" + getCompassImage(direction) + ".jpg alt= />" + lastMarker +
            "<tr><td align=right>Speed:&nbsp;</td><td>" + speed +  " mph</td></tr>" +
            "<tr><td align=right>Distance:&nbsp;</td><td>" + distance +  " mi</td><td>&nbsp;</td></tr>" +
            "<tr><td align=right>Time:&nbsp;</td><td colspan=2>" + gpsTime +  "</td></tr>" +
            "<tr><td align=right>Name:&nbsp;</td><td>" + userName + "</td><td>&nbsp;</td></tr>" +
            "<tr><td align=right>Accuracy:&nbsp;</td><td>" + accuracy + " meter</td><td>&nbsp;</td></tr></table>";

		var gpstrackerMarker;

        var title = userName + " - " + gpsTime;

        // make sure the final red marker always displays on top 
        if (finalLocation) {
            gpstrackerMarker = new L.marker(new L.LatLng(latitude, longitude), {title: title, icon: markerIcon, zIndexOffset: 999}).bindPopup(popupWindowText).addTo(map);
        } else {
            gpstrackerMarker = new L.marker(new L.LatLng(latitude, longitude), {title: title, icon: markerIcon}).bindPopup(popupWindowText).addTo(map);
        }
        
		return gpstrackerMarker;
    }

    function getCompassImage(azimuth) {
        if ((azimuth >= 337 && azimuth <= 360) || (azimuth >= 0 && azimuth < 23))
                return "compassN";
        if (azimuth >= 23 && azimuth < 68)
                return "compassNE";
        if (azimuth >= 68 && azimuth < 113)
                return "compassE";
        if (azimuth >= 113 && azimuth < 158)
                return "compassSE";
        if (azimuth >= 158 && azimuth < 203)
                return "compassS";
        if (azimuth >= 203 && azimuth < 248)
                return "compassSW";
        if (azimuth >= 248 && azimuth < 293)
                return "compassW";
        if (azimuth >= 293 && azimuth < 337)
                return "compassNW";

        return "";
    }
    
    // check to see if we have a map loaded, don't want to autorefresh or delete without it
    function hasMap() {
        if (routeSelect.selectedIndex == 0) { // means no map
            return false;
        }
        else {
            return true;
        }
    }

    function displayCityName(latitude, longitude) {
        var lat = parseFloat(latitude);
        var lng = parseFloat(longitude);
        var latlng = new google.maps.LatLng(lat, lng);
        var reverseGeocoder = new google.maps.Geocoder();
        reverseGeocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                // results[0] is full address
                if (results[1]) {
                    var reverseGeocoderResult = results[1].formatted_address; 
                    showPermanentMessage(reverseGeocoderResult);
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });
    }
		
		
    
			
///// User Triggered Function 
    function getvehicleForMap() { 
        if (hasMap()) {
           var url = 'getrouteformap.php' + $('#routeSelect').val();
            $.ajax({
                   url: url,
                   type: 'GET',
                   dataType: 'json',
                   success: function(data) {
                      loadVehicleLocation(data);
                   },
                   error: function (xhr, status, errorThrown) {
                       console.log("status: " + xhr.status);
                       console.log("errorThrown: " + errorThrown);
                    }
               });
        
        } 
    }

	
    function loadVehicleLocation(json) {
        
				var tempLocation;
                var finalLocation = true;
                var counter = 0;
				                
                // iterate through the locations and create map markers for each location
				$(json.locations).each(function(key, value){
                    tracker_latitude =  $(this).attr('latitude');
                    tracker_longitude = $(this).attr('longitude');
				});
            

                    tempLocation = new L.LatLng(tracker_latitude, tracker_longitude);
						var gpstrackerMarker;
										
                    gpstrackerMarker = createMarkerForMovingVehicle(
                        tracker_latitude,
                        tracker_longitude,
                        $(this).attr('speed'),
                        $(this).attr('direction'),
                        $(this).attr('distance'),
                        $(this).attr('locationMethod'),
                        $(this).attr('gpsTime'),
                        $(this).attr('userName'),
                        $(this).attr('sessionID'),
                        $(this).attr('accuracy'),
                        $(this).attr('extraInfo'),
                        gpsTrackerMap, finalLocation);
						
						//step_latitude = tracker_latitude;
						//step_longitude = tracker_longitude;

                          
    }


	//createMarker_updated
    function createMarkerForMovingVehicle(latitude, longitude, speed, direction, distance, locationMethod, gpsTime,
                          userName, sessionID, accuracy, extraInfo, map, finalLocation) {
        var iconUrl;
        iconUrl = 'http://gaddy.in/gaddy/caricon.png';

        var markerIcon = new L.Icon({
                iconUrl:      iconUrl,
                shadowUrl:    'http://gaddy.in/gaddy/caricon.png',
                iconSize:     [12, 20],
                shadowSize:   [22, 20],
                iconAnchor:   [6, 20],
                shadowAnchor: [6, 20],
                popupAnchor:  [-3, -25]
        });

        var lastMarker = "</td></tr>";
 
 
        var popupWindowText = "<table border=0 style=\"font-size:95%;font-family:arial,helvetica,sans-serif;color:#000;\">" +
            "<tr><td align=right>&nbsp;</td><td>&nbsp;</td><td rowspan=2 align=right>" +
            "<img src=http://gaddy.in/control_panel/mapview/images/images/" + getCompassImage(direction) + ".jpg alt= />" + lastMarker +
            "<tr><td align=right>Speed:&nbsp;</td><td>" + speed +  " mph</td></tr>" +
            "<tr><td align=right>Distance:&nbsp;</td><td>" + distance +  " mi</td><td>&nbsp;</td></tr>" +
            "<tr><td align=right>Time:&nbsp;</td><td colspan=2>" + gpsTime +  "</td></tr>" +
            "<tr><td align=right>Name:&nbsp;</td><td>" + userName + "</td><td>&nbsp;</td></tr>" +
            "<tr><td align=right>Accuracy:&nbsp;</td><td>" + accuracy + " ft</td><td>&nbsp;</td></tr></table>";

        var title = userName + " - " + gpsTime;

        movingMarker = new L.marker(new L.LatLng(tracker_latitude, tracker_longitude), {title: title, icon: markerIcon}).bindPopup(popupWindowText).addTo(map);
		gpsTrackerMap.setView(movingMarker.getLatLng()); 

        
}


	function updateMarkerForMovingVehicle()
	{
		//step_latitude = step_latitude + 0.000050;
		//step_longitude = step_longitude + 0.000050;
		

		//latitude = tracker_latitude + step;
		//longitude = tracker_latitude + step;
      console.log("updatemarker call");

        var url = 'getvehiclelocation.php' + $('#routeSelect').val();
        $.ajax({
                   url: url,
                   type: 'GET',
                   dataType: 'json',
                   success: function(data) {
                    console.log(data);
//                      loadVehicleLocation(data);
					$(data.locations).each(function(key, value){
						step_latitude =  $(this).attr('latitude');
						step_longitude = $(this).attr('longitude');
					});
                   },
                   error: function (xhr, status, errorThrown) {
                       console.log("status: " + xhr.status);
                       console.log("errorThrown: " + errorThrown);
                    }
               });

		
		var newLatLng = new L.LatLng(step_latitude, step_longitude);
		
		movingMarker.setLatLng(newLatLng);
		
		movingMarker.update();
		
		gpsTrackerMap.setView(movingMarker.getLatLng()); 
		//alert('step_latitude: ' + step_latitude.toString() + '  step_longitude:  ' +  step_longitude.toString() + ' new //latlong position : '+newLatLng.toString());
		
	}


	

    function turnOffAutoRefresh() {
        showMessage('Auto Refresh Off');
        $('#autorefresh').val('Auto Refresh Off');
        autoRefresh = false;
        clearInterval(intervalID);         
    }

    function turnOnAutoRefresh() {
        showMessage('Auto Refresh On (1 min)'); 
        $('#autorefresh').val('Auto Refresh On');
        autoRefresh = true;
        restartInterval();         
    }
    
    function restartInterval() {
        // if someone is viewing all Vehicles and then switches to a single vehicle
        // while autorefresh is on then the setInterval is going to be running with getAllVehiclesForMap
        // and not getvehicleForMap 

        clearInterval(intervalID);

        if (viewingAllVehicles) {
            intervalID = setInterval(getAllVehiclesForMap, 60 * 1000); // one minute 
        } else {
            intervalID = setInterval(updateMarkerForMovingVehicle, 2 * 1000);          
       }        
		
    }

    function deletevehicle() {
        if (hasMap()) {
    		// comment out these two lines to get delete working
    		// confirm("Disabled here on test website, this works fine.");
    		// return false;
		
            var answer = confirm("This will permanently delete this vehicle\n from the database. Do you want to delete?");
            if (answer){
                var url = 'deleteroute.php' + $('#routeSelect').val();
                $.ajax({
                       url: url,
                       type: 'GET',
                       success: function() {
                          deletevehicleResponse();
                          getAllVehiclesForMap();
                       }
                   });
            }
            else {
                return false;
            }
        }
        else {
            alert("Please select a vehicle before trying to delete.");
        }
    }

    function deletevehicleResponse() {
        routeSelect.length = 0;

        document.getElementById('map-canvas').outerHTML = "<div id='map-canvas'></div>";

        $.ajax({
               url: 'getroutes.php',
               type: 'GET',
               success: function(data) {
                  loadVehicles(data);
               }
           });
    }

    // message visible for 7 seconds
    function showMessage(message) {
        // if we show a message like start auto refresh, we want to put back our current address afterwards
        var tempMessage =  $('#messages').html();
        
        $('#messages').html(message);
        setTimeout(function() {
            $('#messages').html(tempMessage);
        }, 7 * 1000); // 7 seconds
    }

    function showPermanentMessage(message) {
        $('#messages').html(message);
    }

    // for debugging, console.log(objectToString(map));
    function objectToString (obj) {
        var str = '';
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str += p + ': ' + obj[p] + '\n';
            }
        }
        return str;
    }
    
    function setTheme() {
        //var bodyBackgroundColor = $('body').css('backgroundColor');
        //$('.container').css('background-color', bodyBackgroundColor);
        //$('body').css('background-color', '#ccc');
        // $('head').append('<link rel="stylesheet" href="style2.css" type="text/css" />');        
    }
});

