<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transport Owner Corner</title>
    </head>
    <div class="topnav">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a class="active" href="ownerhome.php">Profile</a>
  <a href="ownerreportedvehicles.php">View Reported Vehicles</a>
  <a href="ownerunroadworthy.php">View Unroad Worthy Vehicles</a>
 
  <br><br><br>
</div>
    <body>
        <?php
         include '../config.php';
         include '../Vehicle.php';
         session_start();
         
               $sql = "SELECT * FROM owner WHERE UserID = ".$_SESSION['UserID']." ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $ownerID = $row['OwnerID'];
      $idNo = $row['IDNo'];
      $name = $row['Name'];
      $surname = $row['Surname'];
      $ListOfVehicles[] = array();
      $sql ="SELECT * FROM vehicle WHERE OwnerID= ".$ownerID;
      $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result))
                {
                    $ListOfVehicles[] = new Vehicle($row['Type'], $row['VINNo'], $row['RegNo'], $row['LRWTestDate'],$row['NRWTestDate'],$row['AssociationID'], $row['ToRoute'], $row['FromRoute'], $row['DriverName'], $row['DriverPDPNo']) ;
                }
      
      //profile div
         
         echo '<div id="profile" style="border: 1px solid ;">';
        echo '<h3>Transport Owner Profile:</h3>';
        echo '<p>ID Number: '.$idNo.'</p>';
        echo '<p>Full Names: '.$name.'</p>';
        echo '<p>Surname: '.$surname.'</p>';
        
        echo '</div>';
        
        // close div
        
        //vehicles details div
        
        for($x = 1; $x < count($ListOfVehicles); $x++)
              {
            echo '<form action = "" method = "post">';     
            echo '<h3 style="border: 1px solid ;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVehicle '.$x.' Details</h3>';
                  echo " <div style='padding='5px''>  <tr>
               <td>Vehicle Type:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'type".$x."' value='".$ListOfVehicles[$x]->getType()."'readonly size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td>Last Road Worthy Test Date: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'lrwt".$x."' value='".$ListOfVehicles[$x]->getLRWT()."'readonly size='30'>
               </td>
               
            </tr>  <br><br>
             <tr>
               <td>VIN Number:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'vin".$x."' value='".$ListOfVehicles[$x]->getVIN()."'readonly size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td>Next Road Worthy Test Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'nrwt".$x."' value='".$ListOfVehicles[$x]->getNRWT()."'readonly size='30'>
               </td>
               
            </tr>  <br><br>
             <tr>
               <td>Registration Number:&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'reg".$x."' value='".$ListOfVehicles[$x]->getRegNo()."'readonly size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td>Registered Transport Association:</td>
               <td><input type = 'text' name = 'ass".$x."' value='".$ListOfVehicles[$x]->getAssociation()."'readonly size='30'>
               </td>
               
            </tr> <br><br>
             <tr>
               <td>Driver Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'name".$x."' value='".$ListOfVehicles[$x]->getName()."'size='26'><input type='image' src='../images/edit.png' alt='Edit'width='35' height='15'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td>Driver PDP Number:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'pdp".$x."' value='".$ListOfVehicles[$x]->getPDP()."' size='26'><input type='image' src='../images/edit.png' alt='Edit'width='35' height='15'>
               </td>
               
            </tr> <br><br>
             <tr>
               <td>Transport From (Route):</td>
               <td><input type = 'text' name = 'from".$x."' value='".$ListOfVehicles[$x]->getFrom()."' size='26'><input type='image' src='../images/edit.png' alt='Edit'width='35' height='15'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td>Transport To (Route):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
               <td><input type = 'text' name = 'to".$x."' value='".$ListOfVehicles[$x]->getTo()."' size='26'><input type='image' src='../images/edit.png' alt='Edit'width='35' height='15'>
               </td>
               
            </tr><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = 'Submit' value='Submit'>
            </div>";
                  
                  echo ' </form>';
              }
           
              
               if($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    for($x = 1; $x < count($ListOfVehicles); $x++)
                      {
                        if($_POST['reg'.$x] == $ListOfVehicles[$x]->getRegNo())
                        {
                            $q = "UPDATE `vehicle` SET `ToRoute`=[".$_POST['to'.$x]."],`FromRoute`=[".$_POST['from'.$x]."],`DriverName`=[".$_POST['name'.$x]."],`DriverPDPNo`=[".$_POST['pdp'.$x]."] WHERE `VINNo`='".$_POST['vin'.$x]."'";
                            mysqli_query($conn,$q);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                      }
                   
                   
                }
          
        
        mysqli_close($conn);
        ?>
    </body>
</html>
