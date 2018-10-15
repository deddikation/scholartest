<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   session_start();

?>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Association Corner</title>
    </head>
    <div class="topnav">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <a  href="associationhome.php">View All Vehicles</a>
  <a class="active" href="associationreportedvehicles.php">View Reported Vehicles</a>
  <a href="associationunroadworthy.php">View Unroad Worthy Vehicles</a>
 <a href="associationprofile.php">Profile</a>
 
  <br><br><br>
</div>
    <body>
        <?php
         include '../config.php';
         include '../Vehicle.php';
      
         
               $sql = "SELECT * FROM association WHERE UserID = ".$_SESSION['UserID']." ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $associationID = $row['AssociationID'];

         // put your code here
        
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID);
      WHERE v.AssociationID=".$associationID);
        
        echo "<table border='1'>
<tr>

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
