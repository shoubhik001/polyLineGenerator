<!DOCTYPE html>
<html>

<!-- Mirrored from matveyan.ru/Themes/geo/default/4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Mar 2018 16:09:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>PloyLine Generator App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/whhg.css">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> <script src="../../assets/js/html5shiv.js"></script> <script src="../../assets/js/respond.min.js"></script> <![endif]-->
    <!--Google maps API linl-->
    <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCzMApFNyasc1ysRoCCCmSHjENkX29X_zQ&amp;sensor=false&amp;libraries=places"></script>
    <!--Your map settings script-->
	
    
    <!--jQuery-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Polyline.encoded.js"></script>
    
   
    
</head>

<body>
    
    <!--map-->

    <div id="map" class="map"></div>
    <!--/map-->
    
        <!--Profile-->
       
        <div class="col-md-12 profile profile_closed" id="profile">
         <span class="close_span" id="open_span"><a href="#" class="close-profile-link clooses" id="link_open">+</a></span>
            <!--User info-->
			<h2 style="padding-left:120px;padding-bottom:50px;" ><u>Mock Location Navigation & Tracking System Control Panel With Ployline Generator  </u></h2>
			
            <div class="row" style="padding-top:25px">
			
                <div class="col-md-20">
				
                    <div class="user">
                        
                        <div>
                            <h2>Enter A Start Point : </h2>  
							<input type="text" style="width:300px;" class="form-control" id="start" placeholder="Start Point" />                         
                        </div>
                    </div>
                    <!--<div class="buttons">
                        <a href="#" class="btn btn-dark btn-sm"><i class="icon-emailalt"></i><span>1</span></a><a href="#" class="btn btn-danger btn-sm">Sign out</a>
                    </div>-->
                </div>
            </div>
			
			
			<div class="row" style="padding-top:25px">
			
                <div class="col-md-20">
				
                    <div class="user">
					<div>
                            <h2>Choose Some Via Points : </h2>  
							<input type="text" style="width:300px;" class="form-control" id="waypoints" placeholder="Via Ponts"  />  							
                        </div>
                    </div>
					<div class="buttons">							
							<a href="#" id="addViaPoint" class="btn btn-success btn-sm" onclick="appendViaPoints();">Add This As A Via Point </a>	
							</div>	
                    <!--<div class="buttons">
                        <a href="#" class="btn btn-dark btn-sm"><i class="icon-emailalt"></i><span>1</span></a><a href="#" class="btn btn-danger btn-sm">Sign out</a>
                    </div>-->
                </div>
				 
            </div>
			
			
			<div class="row news_container"> 
				<div class="col-md-12 news">
					<!--<span class="data">12.11.2013</span> You friend <a href="#">Mattew An</a> visited restaurant "<a href="4.html">Pizza larenzo</a>-->
					<div id="showViaPoints">
						
					</div>
				</div>
			</div>'
			
			
			<div class="row" style="padding-top:25px">
			
                <div class="col-md-20">
				
                    <div class="user">
                        
                        <div>
                            <h2>Select An End Point : </h2>  
							<input type="text" style="width:300px;" class="form-control" id="end" placeholder="End Point" />                         
                        </div>
                    </div>
                    <!--<div class="buttons">
                        <a href="#" class="btn btn-dark btn-sm"><i class="icon-emailalt"></i><span>1</span></a><a href="#" class="btn btn-danger btn-sm">Sign out</a>
                    </div>-->
                </div>
            </div>
			
			<div class="row" style="padding-top:25px">
			
                <div class="col-md-12 my_news">
				 <div class="title_news">
				 
				 
				 
                       <div class="buttons" style="padding-top:5px; padding-left:200px;">							
									<!--<a href="#" id="pause"  onclick="pauseTracking();"><img style="height:20px;" src="img/white-pause-64.png"/></a>	-->
								<input type="submit" id="submit" class="btn btn-success btn-sm" value="Start Mock">
								
								<!--<a href="#" id="submit" ><img style="height:30px;" src="img/play-button.png"/></a>	-->
							</div>
                    </div>
							
				</div>
			</div>	

			<div class="row">
                <!--about-->
                <div class="col-md-12" id="polyline-panel" style="overflow: auto;"> 
                    <h2>PolyLine To Be Generated</h2>
                    
                </div>
                
            </div>			
			
            <!--/User info-->
            <div class="row">
                <!--about-->
                <div class="col-md-7" id="directions-panel" style="overflow: auto;height:350px;"> 
                    <h2>Route Map</h2>
                    
                </div>
                <!--/about-->
                <!--latest tweet-->
                <div class="col-md-5 tweets" style="overflow: auto;height:300px;" id="console-panel" >
                    <h2>Other Details</h2>
                    
                    
                </div>
                <!--/latest tweet-->
            </div>
            
        </div>
        <!--/Profile-->
        <!--Content-->
        
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!--   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    

    <!--Script for working map navigation-->
	<script>
		function initAll(){
		//console.log("In Init All");
		initMap();
		initialize();
		}
		</script>
		
		<script>
		function logPrint(str){
		var consoleLog = document.getElementById('console-panel');
		consoleLog.innerHTML += '<br>' +str;
		}
		</script>
		
		
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzMApFNyasc1ysRoCCCmSHjENkX29X_zQ&signed_in=true&libraries=places&callback=initAll" async defer></script>

	
		<script>
        var map;
        var responseRoute;
        var responseLegs;
        var latLongData = [];
        var nextVal=0;
        var markers = [];
        var delayToCallLocationTrackerFunction = 3000;
		var waypts = [];
		var latLonforPloyline=[];
		var arrayOfLatLong = [];
		
        function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 22.571940, lng: 88.432309},
            styles: [{
                stylers: [{
                    saturation: -100
                }]
            }]
        });
        directionsDisplay.setMap(map);
        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });

            //add the listener to the map within the initMap
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        
        /*var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }*/
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
		  
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
			//console.log("Response ==> "+response);
			responseRoute = response.routes[0].overview_path;
			responseLegs = response.routes[0].legs;
			//console.log("\n Route ==> "+response.routes[0].overview_path+'</br><br>');
			calculateLatLong(responseRoute,responseLegs);
			//createLatLongForTracking(responseRoute);
            var summaryPanel = document.getElementById('directions-panel');
			var consoleLog = document.getElementById('console-panel');
			//consoleLog.innerHTML = '';
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
		
		console.log("Direction Service Route : "+directionsService.route);
      }
	  function calculateLatLong(path,legs){
	  var latLongForpolyLine;
	  var count = 0;
				for(i=0;i<path.length;i++){
                    var obj = new Object();
                    obj['lat'] = path[i].lat();
                    obj['lon'] = path[i].lng();
                    latLongData.push(obj);
					
                    
					var lat = "Lat =>"+obj['lat'];
					var lon = "Lon =>"+obj['lon']
					//console.log("Lat =>"+obj['lat']);
                    //console.log("Lat =>"+obj['lon']);
                    //console.log("Creating Path");
					var latilongi = [];
					//latLongForpolyLine = "["+obj['lat']+","+obj['lon']+"]";
					latilongi.push(obj['lat']);
					latilongi.push(obj['lon']);
					//console.log("latLongForpolyLine =" + latLongForpolyLine);
					
					arrayOfLatLong.push(latilongi);
					
					
					logPrint(lat);
					logPrint(lon);
					logPrint("Creating Path");
				}
				

          var latLongDataJson = JSON.stringify(latLongData);
		  //console.log("---------------------START--------------------------------");
          //console.log("My Desired Output = "+latLongDataJson);
		  //console.log("---------------------END--------------------------------");
		  logPrint("My Desired Output = "+latLongDataJson);

          createLatLongForTracking(latLongDataJson);
		  generateployLine();

          //postDataToPhpFile(latLongDataJson);
			}
			
			/*function postDataToPhpFile(latitude,longitude) {
                //console.log("Posting Data....");
				logPrint("Posting Data....");
                var summaryPanel = document.getElementById('directions-panel');
				var driverEmailID = document.getElementById('driverEmailId').value;
				var speed = 60.00;
                $.ajax({
                    type: "POST",
                    data: {lat:latitude,lon:longitude,driverEmailId:driverEmailID,speed:speed},
                    url: "php/latLongToTracker.php",
                    success: function(data){
                        //data will contain the vote count echoed by the controller i.e.
                        //"yourVoteCount"
                        //then append the result where ever you want like
                        //$("span#votes_number").html(data); //data will be containing the vote count which you have echoed from the controller
                        //summaryPanel.innerHTML += +"Value Send As POST" + '<br><br>';
                    }
                });
				

            }*/
        function addMarker(lat,lng){
            //console.log("In AddMarker Function");
			logPrint("Posting Data....");
			
            clearMarker();
            markers = [];
			//postDataToPhpFile(lat,lng);
            placeMarker({lat: lat, lng: lng})
        }
        function placeMarker(location) {
            //console.log("In PlaceMarker Function");
            logPrint("In PlaceMarker Function");

            marker = new google.maps.Marker({
                position: location,
                icon: "https://i.imgur.com/GM26vNI.png",
                map: map
            });
            markers.push(marker);
            
            setMarekr();
        }
        function setMarekr() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarker() {
            setMapOnAll(null);
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function trackerIcon(lat,long) {

            //console.log("In TrackerIcon Function");
            logPrint("In TrackerIcon Function");
			
            addMarker(lat,long);

        }
        function createLatLongForTracking(latLongData) {
            var totalPath = latLongData;

            var jsonData = JSON.parse(totalPath);

            if(nextVal<jsonData.length){
                myVar = setInterval(printFunction, delayToCallLocationTrackerFunction,jsonData);
            }
        }
        function printFunction(jsonData) {
            for (i=nextVal; i < jsonData.length; i++) {
                var counter = 0;
                counter=counter+1;
                var data = jsonData[i];
                //console.log("This data will be send to tracker");
                logPrint("This data will be send to tracker");
                var trackLatitude = data.lat;
                var trackLongitude = data.lon;
                //console.log("Number of Itterations : " + i);
                logPrint("Number of Itterations : " + i);
                //console.log("In Print Function===>" + data.lat + " " + data.lon);
                logPrint("In Print Function===>" + data.lat + " " + data.lon);
                trackerIcon(trackLatitude, trackLongitude);

                if(counter==1){
                    nextVal=nextVal+1;
                    break;
                }
            }
          //console.log("Next Value :"+nextVal);
          logPrint("Next Value :"+nextVal);
        }

    </script>
	
	
	<script type="text/javascript">
        $(document).ready(function () {
            $('#link_open').on('click', function () {
                if ($('#link_open').hasClass("clooses")) {
                    $("#open_span").removeClass("close_span").addClass("open_span");
                    $("#profile").removeClass("profile_closed");
                    $("#link_open").removeClass("clooses");
                    $("#cont").addClass("none");
                }
                else {
                    $("#open_span").addClass("close_span").removeClass("open_span");
                    $("#profile").addClass("profile_closed");
                    $("#link_open").addClass("clooses");
                    $("#cont").removeClass("none");
                }
            })
        });
    </script>
	<script>
            var autocompleteStart,autocompleteEnd,autocompleteViaPoints;
            function initialize() {
			
              autocompleteStart = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('start')),
                  { types: ['geocode'] });
              google.maps.event.addListener(autocompleteStart, 'place_changed', function() {
              });
			  autocompleteEnd = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('end')),
                  { types: ['geocode'] });
              google.maps.event.addListener(autocompleteEnd, 'place_changed', function() {
              });
			   autocompleteViaPoints = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('waypoints')),
                  { types: ['geocode'] });
              google.maps.event.addListener(autocompleteViaPoints, 'place_changed', function() {
              });
			  
            }
			
        </script>	
		
		<script>
		function appendViaPoints(){
		
		var newViaPoint =document.createElement("span");
		
		var newName = document.getElementById('waypoints').value;
		var name=document.createTextNode(newName);
        newViaPoint.appendChild(name);
		var breakLine = document.createElement("p");
        document.getElementById('showViaPoints').appendChild(newViaPoint);
		newViaPoint.className="data";
		document.getElementById('showViaPoints').appendChild(breakLine);
		
		
		 waypts.push({
              location: newName,
              stopover: true
            });
			
			
		document.getElementById('waypoints').value='';
		
		var styleNode = document.createElement('style');
   styleNode.type = "text/css";
   // browser detection (based on prototype.js)
   if(!!(window.attachEvent && !window.opera)) {
        styleNode.styleSheet.cssText = 'span { padding-top: 10px; }';
   } else {
        var styleText = document.createTextNode('span { padding-top: 10px; } ');
        styleNode.appendChild(styleText);
   }
   document.getElementById('showViaPoints')[0].appendChild(styleNode);
		
		
		
		}
		</script>
		
		<script>
		function initAll(){
		
		initMap();
		initialize();
		}
		
		
		function generateployLine(){
	
		console.log("Array Of Latitudes And Longitude : "+arrayOfLatLong);
		var polyline = new L.Polyline(arrayOfLatLong);
		console.log("Ployline : "+polyline.encodePath());
		
		var polylinePanel = document.getElementById('polyline-panel');
            polylinePanel.innerHTML = ''; 
            polylinePanel.innerHTML += '<b>Generated  PloyLine: ' + polyline.encodePath();
                  '</b><br>';          
		  }
		</script>
		
		
		
		
     
</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111662518-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111662518-2');
</script>


</html>
