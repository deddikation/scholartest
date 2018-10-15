<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.php';
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID);");
        
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

echo "</table>";
mysqli_close($conn);
        ?>
    </body>
</html>
