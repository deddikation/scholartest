<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Association Corner</title>
    </head>
    <body>
          <div class="topnav">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a class="active" href="associationhome.php">View All Vehicles</a>
  <a href="associationreportedvehicles.php">View Reported Vehicles</a>
  <a href="associationunroadworthy.php">View Un-road Worthy Vehicles</a>
 <a href="associationprofile.php">Profile</a>
  <br><br><br>
</div>
         <?php
        
          include("../config.php");
   session_start();
   
   
      // username and password sent from form 
      
     $aID= $_SESSION['associationID'];
     
      $sql = "SELECT * FROM association WHERE associationID = ".$aID;
      
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  print_r($row);
       $assName = $alt =$no= $address= $resp =  $respS= $name = $officeNo = $email = $remail= $phone  = "";
      
    //  $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
    
         $assName=$row['Name'];
         $address = $row['Address'];
         $resp =$row['ContactName'];
         $respS = $row['ContactSurname'];
         $officeNo = $row['OfficeNo'];
         $phone = $row['CellNo'];
         $alt = $row['AltNo'];
         $email = $row['Email'];
         
         
         
         echo '<table>
               
            <tr>
               <td>Association Name:</td>
               <td><input type = "text" name = "assName" value="'.$assName.'">
               </td>
            </tr>';
         
         echo '             <tr>
               <td>Physical Address:</td>
               <td> <input type = "text" name = "address" value="'.$address.'">
               </td>
            </tr>';
         echo '  <tr>
               <td>*Person Responsible Name: </td>
               <td><input type = "text" name = "resp" value="'.$resp.'">
               </td>
            </tr>';
         
         echo ' <tr>
               <td>*Person Responsible Surname:</td>
               <td> <input type = "text" name = "respS" value="'.$respS.'">
               </td>
            </tr>';
         
         echo ' <tr>
               <td>*Office Number:</td>
               <td> <input type = "phone" name = officeNo" value="'.$officeNo.'">
               </td>
            </tr>';
         
         echo '  <tr>
               <td>*Cellphone Number:</td>
               <td> <input type = "phone" name = "phone" value="'.$phone.'">
               </td>
            </tr>';
         
         echo ' <tr>
               <td>*Alternative Cellphone Number:</td>
               <td> <input type = "phone" name = "alt" value="'.$alt.'">
               </td>
            </tr>
            ';
         
         echo ' <tr>
               <td>*Email Address: </td>
               <td><input type = "email" name = "email" value="'.$email.'">
               </td>
            </tr>';
         
         echo "  </table>";
         
        ?>
    </body>
</html>
