<?php
    
    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
     $username=$_POST["username"];
     $password=$_POST["password"];
     
     $con=new mysqli("localhost","root","","dhakamap");
     $sql="SELECT * from users where username='$username' and password='$password'";
     $result=$con->query($sql);
     $row=mysqli_num_rows($result);
     echo $row;
     if($row==1)
     {
         if($username=="admin")
         {
            $_SESSION["user"]=$username;
            $_SESSION["login"]=1;           
             header('location:admin.php');
         }
         else
         {
             $_SESSION["user"]=$username;
            $_SESSION["login"]=1;
           
             header('location:user.php');
             
         }
         
     }
     else
     {
         echo "Wrong Username or Password";
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
                        <li><a href="user.php">Home</a></li>
                        <li><a  href="signup.php">Sign Up</a></li>
                        <li><a class="active" href="login.php">Log In</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class=right>
                <form action=""  method="post"  name="myForm">
                    User Name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                    <input type="text" name="username" id="username">
                    <br><br>
                    Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                    <input type="password" name="password" id="password" class="password" />
                    <br><br>
                    <input type="submit" value="Log In!!!">
              </form>
            </div>
        </div>
    </div> 
</body>
</html>