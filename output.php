<!DOCTYPE html>
<html>
<head>
  <title>Dhaka MAP</title>  
  <link href="style2.css" rel="stylesheet" type="text/css" />
</head>
<body>  
  <?php include 'head.php'; ?>
  <div class="body_wrapper">
        <div class="body">
            <div class="body_left">
                <nav>
                    <ul>
                        <li><a href="user.php">Home</a></li>
                        <li><a  href="signup.php">Sign Up</a></li>
                        <li><a  href="login.php">Log In</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class=right_output>
            <?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
$lat1=$_POST["lat"];
$long1=$_POST["long"];
$lat2=$_POST["lat1"];
$long2=$_POST["long1"];  
  $con=new mysqli("localhost","root","","dhakamap");
  $sql="SELECT * from route";
  $results=$con->query($sql);
  $i=0;
  $j=0;
  $flags=1;
  $flagd=1;
  $r=0;

foreach($results as $result)
  {
    $checker=distance($lat1,$result["latit"],$long1,$result["longit"]);
    for($j=0;$j<$i;$j++)
    {
      if($checker==$distsource[$j])
      {
        $flags=0;
        break;
      } 
      if($checker==$distdest[$j])
      {
        $flagd=0;
        break;
      } 

    }
    $x=$result["latit"];
    $y=$result["longit"];
    $distsource[$i]=distance($lat1,$x,$long1,$y);
    $distdest[$i]=distance($lat2,$x,$long2,$y);
    $locationsource[$i]=$result["stoppage_name"];
    $locationdest[$i]=$result["stoppage_name"];
    $i++;
   
 }


  
  $totindex=$i;
  $s=$d="";
  $ms=min($distsource);
  $md=min($distdest);
  for($j=0;$j<$totindex;$j++)
  {
    if($ms==$distsource[$j])
    {
      echo "Source: ".$locationsource[$j]."<br>";
      $s=$locationsource[$j];
    }
    
         
   }
   for($j=0;$j<$totindex;$j++)
  {
    if($md==$distdest[$j])
    {
      echo "Destination: ".$locationdest[$j];
      $d=$locationdest[$j];
    } 
    
         
   }
          $rou=0;
          $sql="SELECT * FROM `route` order by r_id desc limit 1";
          $result=$con->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $rou=$row["route_id"];
            }
          }
        //  echo "<br>".$rou."<br>";
       //   echo "<br>".$s;

  for($x=1;$x<=$rou;$x++)
      {
        $val=$x;
        $flag1=0;
        $flag2=0;
        $tracker=0;
        $srcindex=0;
        $destindex=0;
        $sql="SELECT * FROM `route` where route_id='$val'";

        $result=$con->query($sql);
        $cas=$result->num_rows;
       // echo "num0frows" .$cas."<br>";
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            
           // echo $row["stoppage_name"];
            //echo "   ".$row["r_id"];
              if(strcmp($s,$row["stoppage_name"])==0)
              {
                $flag1=1;
                $srcindex=$tracker;
             //   echo $row["stoppage_name"];
              }
              if(strcmp($d,$row["stoppage_name"])==0)
              {
                $flag2=1;
                $destindex=$tracker;
               // echo $destindex;
               // echo $row["stoppage_name"];
              }
             $place[$tracker]=$row["stoppage_name"];
              $tracker++;
          }
        }
        if($flag1==1 && $flag2==1)
        {
          //  echo "<br>".$srcindex;
           // echo "<br>".$destindex;

            $r=$x;
            break;
        }


     //   for($ind=0;$ind<sizeof($place);$ind++)
       /// {
         // echo $place[$ind];
       // }
        
      }
          if($flag1==1 && $flag2==1)
          {
            $sql="SELECT `bus_name` FROM `bus` where route_id='$r' ";
            $result=$con->query($sql);
            
            if($result->num_rows > 0) {
                echo "<br>"."Available Busses: ";
              while($row = $result->fetch_assoc()) {
                echo $row["bus_name"].", ";
              }
              echo "<br>";
            }
            $afs;
            $mun;

            $freq=0;
            echo "Route: ";
              if($srcindex<$destindex)
              {
                for($t=$srcindex;$t<=$destindex-1;$t++)
                {
                  if($freq==0)
                  {
                    $afs=$place[$t];
                  }
                  $freq++;

                  echo $place[$t]." ---> ";
                }
                echo $place[$t];
                $mun=$place[$t];
              }
              else
              {
                for($t=$srcindex;$t>=$destindex-1;$t--)
                {
                  if($freq==0)
                  {
                    $afs=$place[$t];
                  }
                  $freq++;
                  echo $place[$t]." ---> ";
                }
                echo $place[$t];
                $mun=$place[$t];
              }
              $sql="SELECT * FROM `fare` where route_id='$val'";
        
        $result=$con->query($sql);
          while($row = $result->fetch_assoc())
          {
              if(strcmp($afs,$row["stoppage_name"])==0)
              {
                  $val1=$row["fare"];
              }
              if(strcmp($mun,$row["stoppage_name"])==0)
              {
                  $val2=$row["fare"];
              }


          }
//          echo $val1."  ".$val2;
          $asd=$val1-$val2;
          $f=abs($asd);
          echo "<br>"."Fare: ".$f;
        }

}
function distance($x1,$x2,$y1,$y2)
{
  $dis=sqrt((($x1-$x2)*($x1-$x2))+(($y1-$y2)*($y1-$y2)));
  return $dis;
}

?>
            </div>
          </div>  
  </div>        
   
</body>
</html>
