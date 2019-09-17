<?php
      session_start();
      if(!empty($_SESSION["msg"]))
      {
        echo "<script type='text/javascript'>";

              echo "alert('Route Information Inserted Successfully')";

              echo "</script>";
      }
      if($_SERVER["REQUEST_METHOD"]=="POST"){
      $i=1;
      $j=0;
      $latfld="latfield"+$i;
      $c=$_POST["hid"];
      $bus_name=$_POST["bus_name"];
      echo $c;
      for($i=1;$i<=$c;$i++){
          $l="latfield".$i;
          
          $lat[$j]=$_POST[$l];
          $l="longfield".$i;
          $long[$j]=$_POST[$l];
          $l="stoppage".$i;
          $stop[$j]=$_POST[$l];
          
          $j=$j+1;
      }
      $_SESSION["Stoppages"]=$stop;
      echo $lat[0];
      echo $stop[0];
      $con=new mysqli("localhost","root","","dhakamap");
     $sql= "SELECT * FROM `route` order by r_id desc limit 1";
     $result=$con->query($sql);
     
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $route=$row["route_id"];
      }
      } 
      $route=$route+1;
      $_SESSION["r"]=$route;
      $sql= "SELECT * FROM `bus` order by bus_id desc limit 1";
     $result=$con->query($sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $bus=$row["bus_id"];
      }
      } 
      $bus=$bus+1;
      echo "<br>".$route;
      echo "<br>".$bus;

      for($i=0;$i<$c;$i++)
      {
        $sql1     = 'INSERT INTO route (`latit`, `longit`, `stoppage_name`, `route_id`) VALUES (\''.$lat[$i].'\',\''.$long[$i].'\',\''.$stop[$i].'\',\''.$route.'\')';
  $result=$con->query($sql1);
      }
            $sql1     = 'INSERT INTO bus(`bus_id`,`bus_name`, `route_id`) VALUES (\''.$bus.'\',\''.$bus_name.'\',\''.$route.'\')';
  $result=$con->query($sql1);
  if($result)
  {

header('location:add_fare.php');
  } 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dhaka MAP</title>    
  <link rel="icon" type="image/png" href="img/favicon.jpg"/>
  <link href="style2.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        html {  height: 100%; }
        #map_canvas {
        height: 100%;
        border-radius: 15px;
      }
    </style>
    <script type="text/javascript">
        var countBox =0;
        var latfield;
        var longfield;
        var stoppage;
        var i;
        var j=0;    
        var c=0;
        var stop=[];
        var lat=[];
        var lang=[];
        var index=0;    
        var s;
        var looper;
     //   alert(route);
       
        function initialize() {
            var latlng = new google.maps.LatLng(23.777176, 90.399452);
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
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
             
               if(countBox>0){
             s=document.getElementById('stoppage'+countBox).value;
              stop.push(s); 
              
              
              }
            var latvalue=[];
            latvalue=  placeMarker(event.latLng);
              addInput(latvalue);

            });
        function placeMarker(location) {

             
           
            var marker = new google.maps.Marker({
              position: location, 
              map: map,
             // draggable:true,
              title: 'First',  
            });
          //  document.getElementById('latfield'+countBox).value =marker.getPosition().lat();
            //document.getElementById('longfield'+countBox).value =marker.getPosition().lng();
            
            var latvalue=[];
            latvalue.push(marker.getPosition().lat());

            latvalue.push(marker.getPosition().lng());
            lat.push(marker.getPosition().lat());
            lang.push(marker.getPosition().lng());
            return latvalue;
            //alert(lang[0]);
      //      window.location.href = "f.php?i=" + countBox;
            
        }
        
       
      }
        var myKey = "AIzaSyCpqv9MH85KjKuZDJ89VH5mpmjrSsKb_JE";
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = "https://maps.googleapis.com/maps/api/js?key=" + myKey + "&sensor=false&callback=initialize";
            document.body.appendChild(script);
        }
        

       function addInput(latvalue)
        { 



          countBox =countBox + 1;
          latfield="latfield"+countBox; 
          longfield="longfield"+countBox; 
           stoppage="stoppage"+countBox; 
          document.getElementById('responce').innerHTML+='Latitude Value'+countBox+'<input type="text" id="'+latfield+'" name="'+latfield+'" value="'+latvalue[0]+'" form="myForm" />';
          document.getElementById('responce').innerHTML+='Longitude Value<input type="text" id="'+longfield+'" name="'+longfield+'" value="'+latvalue[1]+'" form="myForm"  />';
          document.getElementById('responce').innerHTML+='Stoppage Name:<input type="text" id="'+stoppage+'" name="'+stoppage+'" value=""  form="myForm"  /><br/>';
            
        document.getElementById('hid').value=countBox;
        if(countBox>1)
        {
          for(looper=0;looper<(countBox-1);looper++)
              {
                var k=looper+1;
                document.getElementById('stoppage'+k).value =stop[looper];


            
              }
        }      
            
        }

    </script>
  </head>
  <body onload="loadScript()">
<?php include 'head.php'; ?> 
  <div class="body_wrapper">
    <div class="body">
      <div class="body_left">
        <nav>
            <ul>
              <li><a href="admin.php">Home</a></li>
              <li><a class="active" href="add_route_admin.php">Add Route</a></li>
              <li><a href="show_route.php">Show Route</a></li>
              <li><a href="delete_route.php">Delete Route</a></li>
              <li><a href="logout.php">Log Out</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </nav>
      </div>
      <div id="map_canvas" >
    </div>
    </div>
  </div>
    <div class="frm">
      <span id="responce"></span>
    
      <form action="#" method="POST" id="myForm">
   
        Bus : <input type="text"  name="bus_name" value="">
        <input type="hidden" id="hid" name="hid" value=""></br>
        <input type="submit" name="" id="btn" value="Add Bus"></form>
    </div>
  </body>
  </html>