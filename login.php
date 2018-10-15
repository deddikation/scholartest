<?php
require 'config.php';
error_reporting(0);
session_start();
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
 <script> 
     $(function(){ $("head").load("header.html") });
   </script>
    </head>
      <body>
              <div class="header">
     <img src="images/logo.png" alt="Logo" > <h1>Scholar Transport</h1> 
        </div></br></br></br>></br></br></br>
        
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</br></br></br></br></br></br>
        <div style="">
         <div style = "width:300px; border: solid 1px #333; " >
            <div style = "background-color:#333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "password" name = "password" class = "box" /><br/><br />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               
					
            </div>
				
         </div>
			
      </div>
        <?php
        
          include("../config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $active = 'Active';
      $sql = "SELECT UserID,Name,Surname FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         $_SESSION['UserID'] = $row['UserID'];
         $_SESSION['UserName'] = $row['Name']." ".$row['Surname'];
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }


   }
        ?>
        
  

   </body>
</html>