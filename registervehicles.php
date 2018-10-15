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
        <title></title>
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
	
      <h2>Search For Owner</h2>
      
             <br><br><br><br><br>
       <div class="ownerEdit">  
           <form method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td >Owner Name:</td>  <input type = "text" name = "searchname" maxlength="13"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/search.png" name="search" value="tr" alt="search"width="30" height="29">
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
             
             
             $q = "Select * FROM OWNER WHERE name like '%".$_POST['searchname']."%'";
             $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
              
                      echo "<div><form method='POST'> <br><table border='1'>
<tr>
<th >Owner ID</th>
<th >IDNo</th>
<th>Name</th>
<th>Surname</th>

</tr>";
                              while($row = mysqli_fetch_array($result))
{
        echo "<tr >";

echo "<td><input type='submit' name='postedid'value='" . $row['OwnerID'] ."' style='border:none;background: none;'></input></td>";
echo "<td>" . $row['IDNo'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Surname'] . "</td>";

echo "</tr></form></div>";
}
            
              
              
              mysqli_close($conn);
         }
         
         
         
         
                if(isset($_POST['postedid']))
         {
            $i= $_POST['postedid'];
             $_SESSION['oID'] =  $i;
          echo "<script>window.open('registervehicle.php','_self');</script>";
            
            
         }  
             }
        ?>
    </body>
</html>
