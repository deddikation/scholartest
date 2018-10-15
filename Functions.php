<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ByType()
{
        include 'config.php';
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
ORDER BY t.Description ;");
        echo '<form method="post">';
        echo "<table border='1' name='t01'>
<tr>
<th>Reported For</th>
<th>Registered Transport Association</th>

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
        echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['aName'] . "</td>";

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
echo '</form>';
mysqli_close($conn);
$_SESSION['res'] = $result;

}


function Display()
{
    include 'config.php';
    $result = mysqli_query($conn,"SELECT i.ID, i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
WHERE i.status ='Logged' ;");
    echo '<form action="" method="post" style="padding-left: 150px" >';
    echo "<table border='1' name='t01'>
<tr>
<th>Incident Number</th>
<th>Reported For</th>
<th>Registered Transport Association</th>

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

        echo "<td><input type='submit' name='postedid'value='" . $row['ID'] ."' style='border:none;background: none;'></input></td>";

        echo "<td>" . $row['Description'] . "</td>";
        echo "<td>" . $row['aName'] . "</td>";

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
    echo '</form>';
    mysqli_close($conn);
    $_SESSION['res'] = $result;

}

function ByArea()
{
        include 'config.php';
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
ORDER BY i.location ;");
        
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
}









function ByAssociation()
{
        include 'config.php';
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
ORDER BY a.AssociationID ;");
        
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
}









function AllBar()
{
   include 'config.php';
        $result1 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 1");
        $result2 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 2");
        $result3 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 3");
        
       $row1 = mysqli_fetch_assoc($result1); 
       $count1 = $row1['result'];
       $row1 = mysqli_fetch_assoc($result2); 
       $count2 = $row1['result'];
       $row1 = mysqli_fetch_assoc($result3); 
       $count3 = $row1['result'];

        
     //   echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
        echo "<script type='text/javascript'>
google.charts.load('visualization', '1', {packages: ['corechart']}); 
</script>
</head>
<body>
<div id='container' style='width: 400px; height: 400px; margin: 0 auto'></div>
<script language='JavaScript'>
function drawChart() {
// Define the chart to be drawn.
var data = google.visualization.arrayToDataTable([
['Report Type', 'No Occurences', { role: 'style' }],
['Overloaded Vehicle', ".$count1.",'orange'],
['None Roadworthy Vehicle',".$count2.",'brown'],
['Reckless Driver', ".$count3.",'red']
]);
var options = {
title: 'Reported Vehicles Chart',
width: 1200,
        height: 800,
        bar: {groupWidth: '95%'},
        legend: { position: 'none' }
}; 
// Instantiate and draw the chart.
var chart = new google.visualization.ColumnChart(document.getElementById('container'));
chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart);
</script>";
        
mysqli_close($conn);
}


function AllPie()
{
        include 'config.php';
        $result1 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 1");
        $result2 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 2");
        $result3 = mysqli_query($conn,"SELECT COUNT(type_id) as 'result' FROM incident GROUP BY type_id HAVING type_id = 3");
        
       $row1 = mysqli_fetch_assoc($result1); 
       $count1 = $row1['result'];
       $row1 = mysqli_fetch_assoc($result2); 
       $count2 = $row1['result'];
       $row1 = mysqli_fetch_assoc($result3); 
       $count3 = $row1['result'];

        
     //   echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
        echo '<script type="text/javascript">

google.charts.load("current", {"packages":["corechart"]});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ["Report Type", "No Occurences"],
  ["Overloaded Vehicle",'.$count1.'],
  ["None Roadworthy Vehicle",'.$count2.'],
  ["Reckless Driver",'.$count3.']
]);

  // Optional; add a title and set the width and height of the chart
  var options = {"title":"Reported Vehicles Chart", "width":1200, "height":800};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById("piechart"));
  chart.draw(data, options);
}
</script>';
        
mysqli_close($conn);
}





function ByRoadWorthy()
{
        include 'config.php';
        $result = mysqli_query($conn,"SELECT v.regNo, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((vehicle v
LEFT JOIN association a ON v.AssociationID = a.AssociationID)
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
WHERE v.NRWTestDate < CURDATE() ;");
        
        echo "<table border='1'>
<tr>

<th>Registered Transport Association</th>

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
}





function ByDate($to,$from)
{
      include 'config.php';
        $result = mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
WHERE i.date BETWEEN ".$from." AND ".$to.";");
        
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
}




function Validate($idNumber) {
		$correct = true;
		if (strlen($idNumber) !== 13 || !is_numeric($idNumber) ) {
			echo "ID number does not appear to be authentic - input not a valid number";
			$correct = false; die();
		}

		$year = substr($idNumber, 0,2);
		$currentYear = date("Y") % 100;
		$prefix = "19";
		if ($year < $currentYear)
		    $prefix = "20";
	    $id_year = $prefix.$year;

        $id_month = substr($idNumber, 2,2);
        $id_date = substr($idNumber, 4,2);

		$fullDate = $id_date. "-" . $id_month. "-" . $id_year;
		
		if (!$id_year == substr($idNumber, 0,2) && $id_month == substr($idNumber, 2,2) && $id_date == substr($idNumber, 4,2)) {
			echo 'ID number does not appear to be authentic - date part not valid'; 
			$correct = false;
		}
		$genderCode = substr($idNumber, 6,4);
        $gender = (int)$genderCode < 5000 ? "Female" : "Male";

       $citzenship = (int)substr($idNumber, 10,1)  === 0 ? "citizen" : "resident";//0 for South African citizen, 1 for a permanent resident

        $total = 0;
        $count = 0;
	    for ($i = 0;$i < strlen($idNumber);++$i)
	    {
		    $multiplier = $count % 2 + 1;
		    $count ++;
		    $temp = $multiplier * (int)$idNumber{$i};
		    $temp = floor($temp / 10) + ($temp % 10);
		    $total += $temp;
	    }
	    $total = ($total * 9) % 10;

	    if ($total % 10 != 0) {
	        echo 'ID number does not appear to be authentic - check digit is not valid';
		    $correct = false;
	    }

        if ($correct){
            echo nl2br( "\nSouth African ID Number:   ". $idNumber .
                '  Birth Date:   ' . $fullDate.
                '  Gender:  ' . $gender .
                '  SA Citizen:  ' . $citzenship);
        }
	}
        
        
         function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
        
  
  function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}
  
  
        function ExportAllExcel($result)
        {
            include 'config.php';
/*$result =  mysqli_query($conn,"SELECT i.regNo,t.Description, a.Name as 'aName', v.Type,v.DriverName,v.DriverPDPNo,v.LRWTestDate,v.NRWTestDate,v.ToRoute,v.FromRoute,o.Name as 'oName'
FROM ((incident i
LEFT JOIN vehicle v ON i.regNo = v.RegNo)
LEFT JOIN association a ON v.AssociationID = a.AssociationID
LEFT JOIN incidenttypes t ON i.type_id = i.ID
LEFT JOIN owner o ON v.OwnerID = o.OwnerID)
ORDER BY t.Description ;"); */

$number_of_fields = mysqli_num_fields($result);
$headers = array();
for ($i = 0; $i < $number_of_fields; $i++) {
    $headers[] = mysqli_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
        }

        }