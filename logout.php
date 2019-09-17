<?php

session_start();
unset($_SESSION["username"]);
$_SESSION["login"]=0;
unset($_SESSION["login"]);
header('location:index.php');
session_destroy();
?>
</body>
</html>


   