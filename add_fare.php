<?php
session_start();
if($_SESSION["login"]!=1)
     {
            header('location:index.php');
     }
$a=$_SESSION["Stoppages"];

	$_SESSION["a"]=$a;
?>

<?php

	if($_SERVER["REQUEST_METHOD"]=="POST"){

	$con=new mysqli("localhost","root","","dhakamap");
     $r=$_SESSION["r"];
     $a=$_SESSION["a"];

	$size=sizeof($a);
     

      for($i=0;$i<$size;$i++)
      {
      	$f="f".$i;
      	$val=$_POST[$f];
        $sql1     = 'INSERT INTO fare (`stoppage_name`, `fare`, `route_id`) VALUES (\''.$a[$i].'\',\''.$val.'\',\''.$r.'\')';
  		$result=$con->query($sql1);
      }

      $n=$size-1;

     /* for($i=$n;$i>=0;$i--)
      {
      	$f="fd".$i;
      	$val=$_POST[$f];
        $sql1     = 'INSERT INTO bus_down_route (`stoppage_name`, `fare`, `route_id`) VALUES (\''.$a[$i].'\',\''.$val.'\',\''.$r.'\')';
  		$result=$con->query($sql1);
      }*/
      if($result)
      {
      	echo "<script type='text/javascript'>";

        echo "alert('Route Information Inserted Successfully')";

        echo "</script>";
        $__SESSION["msg"]="Route Information Inserted Successfully";
      	header('location:add_route.php');
      }
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dhaka Map</title>
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
                        <li><a class="active" href="login.php">Log In</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
              <div class="fare_div">
                <form action="#" method="post">
                <?php
                	$a=$_SESSION["a"];

                	$size=sizeof($a);
                	echo "<br>"."<h1>"."Fare"."</h1>"."<br>";
                	
                	for($i=0;$i<$size;$i++)
                	{
                		$stop_name="s".$i;
                		$fare="f".$i;
                		$num=$i+1;
                		echo "Stoppage".$num."<input type=\"text\" name=\"" . $stop_name . "\" value=\"" . $a[$i] . "\">";
                		echo "<br>"."<br>"."Fare".$num."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."<input type='text' name=\"" . $fare . "\" >"."<br>"."<br>";
                	}	

                	$ns=$size-1;
                	


                ?>	
                <input type="submit" value="add">
                </form>
                </div>
            </div>

</body>
</html>


