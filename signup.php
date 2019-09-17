<!DOCTYPE html>
<html>
<head>
  <title>Dhaka MAP</title>    
  <link rel="icon" type="image/png" href="img/favicon.jpg"/>
  <link href="style2.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
         function validate()
         {
         
            if( document.myForm.name.value == "" )
            {
               alert( "Please provide your Name!" );
               document.myForm.name.focus() ;
               return false;
            }
            else
            {

               var name=document.getElementById("name").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    var x='.';
                   /* for(i=0;i<=array.length;i++)
                    {

                         if(array[i]!='.'){
                             if((array[i]<'A' || array[i]>'Z') && (array[i]< 'a' || array[i]>'z')){

                                
                            alert( "Invalid character in your name!" );
                          document.myForm.name.focus();
                            return false;                           }
                         }


                    }*/
               

            }
            if( document.myForm.username.value == "" )
            {
               alert( "Please provide Username!" );
               document.myForm.username.focus() ;
               return false;
            }


            else
            {

               var name=document.getElementById("username").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    var x='.';
                    
               

            }

            if( document.myForm.email.value == "" )
            {
               alert( "Please provide your Email!" );
               document.myForm.email.focus() ;
               return false;
            }
            else{
          

                    var email = document.getElementById('email');
                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                    if (!filter.test(email.value)) {
                           alert('Please provide a valid email address');
                         return false;
                         document.myForm.email.focus() ;

                    }
            
            }
            if(document.myForm.nationality.value=="")
              {
                   alert("Please Enter Your Nationality");
                   document.myForm.nationality.focus();
                   return false;
              }

       }        

         </script>

</head>
<body>

    <?php

  $nameerr=$usernameerr=$emailerr=$nationalityeerr=$pwerr=$cpwerr="";
  $name=$username=$email=$nationality="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(empty($_POST["name"]))
      {
        
        $fnameerr="Name is required";


      }
      else
      {
               $name=test_input($_POST["name"]);
                  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameerr = "Only letters and white space allowed"; 
                   }

      }

      

    if(empty($_POST["username"]))
      {
        
        $usernameerr="UserName is required";


      }
      else
      {

        $username=$_POST["username"];



      }
          if(empty($_POST["nationality"]))
      {
        
        $nerr="Nationalitya is required";


      }
      else
      {
        $n=$_POST["nationality"];
      }



        if (empty($_POST["email"])) {
         $emailerr = "Email is required";
      } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format"; 
        }
      }
      if (empty($_POST["pw"])) {
         $pwerr = "Password is required";
      }
      else
      {
        $pw=$_POST["pw"];
      }
      if (empty($_POST["cpw"])) {
         $cpwerr = "Confirm Password is required";
      }
      else
      {
        $cpw=$_POST["cpw"];
      }


     $con=new mysqli("localhost","root","","dhakamap");
     $sql= 'INSERT INTO members(`name`,`email`,`nationality`,`UserName`) 
         VALUES(\''.$name.'\',\''.$email.'\',\''.$n.'\',\''.$username.'\')';
      $result=$con->query($sql);
      if(!$result)
      {

      echo "<script type='type/javascript'>";
      echo "Insertion Error";
      echo "</script>";
      }
      else{
        $sql1 = 'INSERT INTO users (`username`, `password`) VALUES (\''.$username.'\',\''.$pw.'\')';
        $result1=$con->query($sql1);
        $con->close();
            echo "<script type='text/javascript'>";

        echo "alert('Signed Up Successfully')";

        echo "</script>";
   }
     
}
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php include 'head.php'; ?> 
     <div class="body_wrapper">
    <div class="body">
      <div class="body_left">
        <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a class="active" href="signup.php">Sign Up</a></li>
              <li><a href="login.php">Log In</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </nav>
      </div>
                      <div class="sign">
                        <h1>Personal Information!!!!</h1></br></br>
                        <form action="#"  method="post"  name="myForm" onsubmit="return validate();" >

                            Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="name" id="name">
                            <span class="error"><?php echo $nameerr;?></span>
                            <br><br>
                            

                            Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="email" id="email">

                            <span class="error"> <?php echo $emailerr;?></span>
                            <br><br>

                            
                            Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="nationality" id="nationality">
                            <span class="error"><?php echo $nationalityeerr;?></span>
                            <br><br>
                            

                            Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="username" id="username">
                            <span class="error"> <?php echo $usernameerr;?></span>
                            <br><br>


                            Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="pw" id="pw">
                            <span class="error"> <?php echo $pwerr;?></span>
                            <br><br>


                            Confirm Password&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="text" name="cpw" id="cpw">
                            <span class="error"> <?php echo $cpwerr;?></span>
                            <br><br>




                            <br><br>
                               

                            <input type="submit" value="Sign Up Now!!!">
                      </form>
                        
                    </div>      
                 </div>
                </div>

</body>
</html>