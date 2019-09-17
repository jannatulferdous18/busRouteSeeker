<?php
      session_start();
  if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }
     if($_SESSION["login"]!=1)
     {
            header('location:index.php');
     }
     $con=new mysqli("localhost","root","","dhakamap");
  $sql="SELECT * from bus";
  $results=$con->query($sql);
    $i=0;
    foreach($results as $row) {
        $a[$i]=$row["bus_name"];
        $ind[$i]=$row["bus_id"];
        $i++;
    }
    $xsn="";
    $xf="";
    $tr=0;


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dhaka Map</title>
	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style2.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include 'head.php'; ?> 
    <div class="body_wrapper">
        <div class="body">
            <div class="body_left">
                <nav>
                    <ul>
                        <li><a  href="admin.php">Home</a></li>
                        <li><a href="add_route_admin.php">Add Route</a></li>
                        <li><a class="active" href="show_route.php">Show Route</a></li>
                        <li><a href="delete_route.php">Delete Bus</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class=right>
                <form method="POST">
                <select name="mydropdownCust">
                 <?php
                   $n=$_SESSION["size"];
                   $a=$_SESSION["buses"];
                   $ind=$_SESSION["ind"];
                   for($i=0;$i<$n;$i++)
                   {
                       echo "<option value=\"" . $ind[$i] . "\">".$a[$i]."</option>";

                   }

                   ?>
                  </select>
                <input type="submit" name="delete" value="Show">
              </form>


              <br><br><br><br>
              <table border="1" width="600px" color="#fff">
              <tr>
              <th>Stoppage Name</th>
              <th>Fare</th>
              </tr>
              <?php
                  $_SESSION["size"]=$i;
    $_SESSION["buses"]=$a;
    $_SESSION["ind"]=$ind;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $val=$_POST["mydropdownCust"];
        $i=0;
        $con=new mysqli("localhost","root","","dhakamap");
        $sql="Select * from fare where route_id=(select route_id from bus where bus_id='$val')";
        $results=$con->query($sql);
      foreach($results as $row) {
        $xsn[$i]=$row["stoppage_name"];
        $xf[$i]=$row["fare"];
        $i++;
    }
                  $size=sizeof($xsn);
              for($ind=0;$ind<$size;$ind++)
              {
               
                echo "<tr>";

                echo "<td>".$xsn[$ind]."</td>";

                echo "<td>".$xf[$ind]."</td>";
                echo "</tr>";

              }
    $_SESSION["stop"]=$xsn;
    $_SESSION["fare"]=$xf;
    }
              /*$nv=$_SESSION["stop"];
              $nx=$_SESSION["fare"];
              $size=size($nv);*/

              ?>
              </table>
            </div>
        </div>
    </div> 
</body>
</html>