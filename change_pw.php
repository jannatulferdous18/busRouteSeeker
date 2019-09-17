<?php
  session_start();
  if($_SESSION["login"]!=1)
     {
            header('location:index.php');
     }
  $username=$_SESSION["user"];
    if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $oldpassword = $_POST["cur_pass"];
    $newpassword= $_POST["new_pass"];
    $confirm_password = $_POST["confirm_pass"];
   // $email = $_SESSION["email"];
$con =new mysqli("localhost","root","","dhakamap");

if (!$con)
 {
die('Could not connect');
  }

  $select="SELECT * from users where username='$username'"; 

  $res=$con->query($select);

  foreach($res as $val)
  {
      $p=$val["password"];
  }
  if($newpassword==$confirm_password && $p==$oldpassword)
    {
  $insert=$con->query("UPDATE users set password='$confirm_password' where username='$username'"); 
  }

  if($insert)
  {

   echo "<script type='text/javascript'>";

    echo "alert('Password has been changed')";

    echo "</script>";
    }
  else
    {
      echo "<script type='text/javascript'>";

    echo "alert('Something went wrong')";

    echo "</script>";
    }

  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>DHAKA MAP</title>    
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
                        <li><a href="index.php">Home</a></li>
                        <li><a  href="user.php">I am</a></li>
                        <li><a href="add_route.php">Add Route</a></li>
                        <li><a class="active" href="change_pw.php">Change Password</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="cpass">
                <form method="POST" action="#">

                   Current Password&nbsp;&nbsp;&nbsp;:&nbsp;
                   <input type="password" id="cur_pass" name="cur_pass"/></br>
                   New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                   <input type="password" id="new_pass" name="new_pass"/></br>
                   Confirm Password&nbsp;&nbsp;:&nbsp;
                   <input type="password" id="confirm_pass" name="confirm_pass"/></br>
                    <button>Change</button>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>