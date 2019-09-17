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
                        <li><a class="active" href="admin.php">Home</a></li>
                        <li><a href="add_route_admin.php">Add Route</a></li>
                        <li><a href="show_route.php">Show Route</a></li>
                        <li><a href="delete_route.php">Delete Bus</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="contactus_admin.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class=right>
                
              </form>
            </div>
        </div>
    </div> 
</body>
</html>