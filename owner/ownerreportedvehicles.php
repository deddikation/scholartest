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
        
        echo '</div><br><br>';
         // put your code here
        
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID);
      WHERE v.OwnerID=".$ownerID);
        
        echo "<table border='1'>
<tr>
<th>Registered Transport Association</th>
<th>Reported For</th>
<th>Transport Owner Name</th>
<th>Driver Name</th>
<th>Driver PDP No</th>
<th>Vehicle Type</th>
<th>Vehicle Registration Number</th>
<th>Last Road Worthy Test Date</th>
<th>Next Road Worthy Test Date</th>
<th>Transport From (Route)</th>
<th>Transport To (Route)</th>
</tr>";
        if($result)
              {
        while($row = mysqli_fetch_array($result))
{
        echo "<tr>";
echo "<td>" . $row['aName'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['oName'] . "</td>";
echo "<td>" . $row['DriverName'] . "</td>";
echo "<td>" . $row['DriverPDPNo'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";
echo "<td>" . $row['regNo'] . "</td>";
echo "<td>" . $row['LRWTestDate'] . "</td>";
echo "<td>" . $row['NRWTestDate'] . "</td>";
echo "<td>" . $row['ToRoute'] . "</td>";
echo "<td>" . $row['FromRoute'] . "</td>";
echo "</tr>";
}
              }
        else {
                 echo "<tr>";
echo "<td> No Reported Vehicle </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "<td>  </td>";
echo "</tr>";

              }
echo "</table>";
        
        
        
        
        mysqli_close($conn);
        ?>
    </body>
</html>
