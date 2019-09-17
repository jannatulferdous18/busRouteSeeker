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
                        <li><a href="userhome.php">Home</a></li>
                        <li><a class="active" href="login.php">Log In</a></li>
                        <li><a href="add_route.php">Add Route</a></li>
                        <li><a href="change_pw.php">Change Password</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <div class="profile">
    <?php

    	
         $con=new mysqli("localhost","root","","dhkmap");
         $sql="SELECT * from member where id='$username'";
         $results=$con->query($sql);
         echo "<div class='prof'>";
         foreach($results as $row)
         {
         	echo "Name         :  ".$name."<br>";
            echo "User Name    :  ".$username."<br>";
    		echo "Email        :  ".$row["email"]."<br>";
         	echo "Nationality  :  ".$row["nationality"]."<br>";
        }
         echo "</div>";

    ?>
    </div>
</div>

</body>
</html>