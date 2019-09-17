<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html {  height: 100%; }
        #map {
        height: 100%;
        border-radius: 15px;
      }
    </style>

    
</head>

<body onload="loadScript()">
<div class="body_wrapper">
    <div class="body">
     <div class="body_left">
            <nav>
              <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
              </ul>
            </nav>
      </div>

    <div id="map" >
    </div>
    </div>
    </div>
       <form action="output.php" method="post">
      <input type="hidden" name="lat" id="lat">
      <input type="hidden" name="long" id="long">
       <input type="hidden" name="lat1" id="lat1">
      <input type="hidden" name="long1" id="long1">
      <p align="Center"><input type="submit" name="search" value="search" ></p>
    </form>

   <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng(23.744536628768838, 90.37284851074219);
            var myOptions = {
                zoom: 18,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
            };

            var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

            var c=0;
              var x=0;
            google.maps.event.addListener(map, 'click', function(event) {

              placeMarker(event.latLng);
    });
            var count =1;
    function placeMarker(location) {
          if(count <= 2) {
           
          var marker = new google.maps.Marker({
              position: location, 
              map: map,
              draggable: true,
              title: 'First',
              
          });
        var lat=location.lat();
        var long=marker.getPosition().lng();
            if(count==1)
            {

              document.getElementById('lat').value=lat;
              document.getElementById('long').value=long;
            }
            else if(count==2)
           {
              document.getElementById('lat1').value=lat;
              document.getElementById('long1').value=long;

           }

      }
      
      count = count + 1;


    
    }
       
      }
        var myKey = "AIzaSyCpqv9MH85KjKuZDJ89VH5mpmjrSsKb_JE";
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = "https://maps.googleapis.com/maps/api/js?key=" + myKey + "&sensor=false&callback=initialize";
            document.body.appendChild(script);
        }
        </script>
</body>
</html>
