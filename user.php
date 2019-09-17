
<?php
	
	session_start();
    $a="";
    if(!empty($_SESSION["user"])){
     $a=$_SESSION["user"];
    }
     if(!isset($_SESSION["login"]))
     {
            header('location:index.php');
     }
      
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
                        
                        <li><a class="active" href="user.php">I am</a></li>
                        <li><a href="add_route.php">Add Route</a></li>
                        <li><a href="change_pw.php">Change Password</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="contactus_user.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="profile">
            <?php

            	
                 $con=new mysqli("localhost","root","","dhakamap");
                 $sql="SELECT * from members where username = '$a'";
                 $results=$con->query($sql);
                 echo "<div class='prof'>";
                 foreach($results as $row)
                 {
                    echo "User Name         :  ".$row["username"]."<br>";
                 	echo "Name         :  ".$row["name"]."<br>";
            		echo "Email        :  ".$row["email"]."<br>";
                 	echo "Nationality  :  ".$row["nationality"]."<br>";
                }
                 echo "</div>";

            ?>
            </div>
        </div>
    </div>
</body>
</html>