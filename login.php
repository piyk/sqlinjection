<?php
   session_start();
    $servername = "localhost";
    $username = "root";
    $password = "abc12345";
    $db = "db";
    $conn = new mysqli($servername, $username, $password,"db");

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      //$row = mysqli_fetch_array($result);
      //$active = $row['active'];
      
      $count = $result->num_rows ;
     
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count > 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">

      <div align = "center">
            <h1> SQL Injection Test <hr>
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
        
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><br /><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><br /><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;
 echo  "<hr>".$sql;

                ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>