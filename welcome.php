<?php
  session_start();
   
   $user_check = $_SESSION['login_user'];
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $user_check; ?></h1> 
      <h2><a href = "login.php">Sign Out</a></h2>
   </body>
   
</html>