<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
        <title>User Password Reset</title>
    </head>
    <body>
    <div id="header" class="header">
        <div>
            <img src="images/logo.png" alt="Logo" >
            <button>Help</button>
            <button>Logout</button>
        </div>

        <h1>&nbsp; Scholar Transport Incident Management</h1>
        <?php

        echo "<h3>Welcome, &nbsp;".$_SESSION['UserName']."</h3> &nbsp;"
        ?>
        <p>&nbsp; Vehicle Owner Management Console</p>
    </div>

        <div class="ownerReg">
	
      <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reset User Password</h2>
      
          <br><br><br><br><br>  <br><br><br>
       <div class="ownerEdit">  
           <form method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td >User Email Address:</td>  <input type = "text" name = "searchname" maxlength="13"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/search.png" name="search" value="tr" alt="search"width="30" height="29">
           </form>
          <br></div>
      
    <!-- 
    
      -->
    
       
 </div>

        
        <?php
        include 'config.php';
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
             {
                             if(isset($_POST['search']))
         {
             
             $_SESSION['usernameS'] = $_POST['searchname'];
             $q = "Select * FROM user WHERE username like '%".$_POST['searchname']."%'";
             $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
              
                      echo "<div><form method='POST'> <br><table border='1'>
<tr>

<th >Email</th>
<th></th>


</tr>";
                              while($row = mysqli_fetch_array($result))
{
        echo "<tr >";


echo "<td>" . $row['username'] . "</td>";
echo "<td><input type='submit' name='postedid'value='Reset'></input></td>";


echo "</tr></form></div>";
}
            
              
              
              mysqli_close($conn);
         }
         
         
         
           if(isset($_POST['postedid']))
         {
               $clicked = $_POST['postedid'];
               
                  if($clicked=='Reset')
              {
                             $q = "UPDATE user SET password='password' WHERE username='".$_SESSION['usernameS']."'";
                mysqli_query($conn,$q) or die(mysqli_error($conn));
                  echo '<script language="javascript">';
echo 'alert("Password succesfully Reset")';
echo '</script>';
                  }
           }
             }
        ?>
    </body>
</html>
