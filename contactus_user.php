<!DOCTYPE html>
<html>
<head>
	<title>DHAKA MAP</title>		
	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style2.css" rel="stylesheet" type="text/css" />
    <style>
    .rr{
        float: left;
        width: 800px;
        height: 300px;
        margin-left: 150px;
    }
div.img {
    margin: 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    float: left;
    width: 180px;
}

div.img:hover {
    border: 1px solid #777;
    border-radius: 2px;
}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>
</head>
<body>  
<?php include 'head.php'; ?> 
    <div class="body_wrapper">
        <div class="body">
            <div class="body_left">
                <nav>
                    <ul>
                        <li><a href="user.php">Home</a></li>
                        <li><a  href="user.php">I am</a></li>
                        <li><a href="add_route.php">Add Route</a></li>
                        <li><a href="change_pw.php">Change Password</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a class="active" href="contactus_user.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        <div class="rr">
            <div class="img">
            <a target="_blank" href="img_fjords.jpg">
            <img src="img/sir.jpg" alt="Trolltunga Norway" width="300" height="200">
            </a>
            <div class="desc">Supervised By :</br>TAMJID AL RAHAT</br>Lecturer</br>Email : tamjid@cse.uiu.ac.bd</div>
            </div>
            <div class="img">
            <a target="_blank" href="img_forest.jpg">
            <img src="img/afser.jpg" alt="Forest" width="600" height="400">
            </a>
            <div class="desc">Md Afser</br>Student</br>Email : uiu.afser@gmail.com</div>
            </div>

            <div class="img">
            <a target="_blank" href="img_lights.jpg">
            <img src="img/jf.jpg" alt="Northern Lights" width="600" height="400">
            </a>
            <div class="desc">Jannatul Ferdous</br>Student</br>Email : jannatul.uiu@gmail.com</div>
            </div>
        </div>
        </div>
        </div>
</body>
</html>