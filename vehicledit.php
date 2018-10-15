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
        <title>Edit Vehicle Details</title>
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
      <br><br><br>
        <br><br>
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
             
            $q = "Select * FROM Vehicle WHERE OwnerID = ".$i;
            $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
                             echo "<div><form method='POST'> <br><table border='1'>
<tr>
<th >VIN No</th>
<th >Registration Number</th>
<th>Vehicle Type</th>


</tr>";
             
    while($row = mysqli_fetch_array($result))
{
        echo "<tr >";

echo "<td><input type='submit' name='vin'value='" . $row['VINNo'] ."' style='border:none;background: none;'></input></td>";
echo "<td>" . $row['RegNo'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";

echo "</tr></form></div>";
}
            
            
            
         }  
         
         
         
           if(isset($_POST['vin']))
         {
            $i= $_POST['vin'];
             $_SESSION['oID'] =  $i;
             
            $q = "Select * FROM Vehicle WHERE VINNo = '".$i."'";
            $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            
            echo '  <div class="ownerReg"> <form  method = "POST" >
       
          <table>
         
            <tr>
               <td>Vehicle Type</td>
               <td>'. $row['Type'] .'</td>
                  
               </td>
            </tr>
            
            <tr>
               <td>VIN Number</td>
                  <td>'. $row['VINNo'] .'</td>
               </td>
            </tr>
           
            
           <tr>
               <td>Registration Number</td>
               <td>'. $row['RegNo'] .'</td>
               </td>
            </tr>
         
                <tr>
               <td>Last Road Worthy Test Date</td>
                <td><input type = "date" name = "LRWTestDate" value="'. $row['LRWTestDate'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
          <tr>
               <td>Next Road Worthy Test Date</td>
               <td><input type = "date" name = "NRWTestDate" value="'. $row['NRWTestDate'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
                <tr>
               <td>To Route</td>
                <td><input type = "text" name = "ToRoute" value="'. $row['ToRoute'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>From Route</td>
               <td><input type = "text" name = "FromRoute" value="'. $row['FromRoute'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
 
           <tr>
               <td>Driver Name</td>
               <td><input type = "text" name = "DriverName" value="'. $row['DriverName'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            
<tr>
               <td>Driver PDP Number</td>
               <td><input type = "text" name = "DriverPDPNo" value="'. $row['DriverPDPNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
         </table>
         <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button  type = "submit" name = "submitChange" value = "Submitted">Submit</button>
         <button  type = "cancel" name = "submitChange" value = "Cancel">Cancel</button>
      </form></div>';
            
            
            
         }  
         
         
              if(isset($_POST['submitChange'])) 
          {
              $clicked = $_POST['submitChange'];
           
              
              if($clicked=='Submitted')
              {
                 
                  $LRWTestDate = $_POST['LRWTestDate'];
                  $NRWTestDate = $_POST['NRWTestDate'];
                  $ToRoute = $_POST['ToRoute'];
                  $FromRoute = $_POST['FromRoute'];
                  $DriverName = $_POST['DriverName'];
                  $DriverPDPNo = $_POST['DriverPDPNo'];
                  $q = "UPDATE vehicle SET LRWTestDate='".$LRWTestDate."', NRWTestDate='".$NRWTestDate."', ToRoute='".$ToRoute."' ,FromRoute='".$FromRoute."',DriverName='".$DriverName."',DriverPDPNo='".$DriverPDPNo."' WHERE VINNo='".$_SESSION['oID']."'";
                mysqli_query($conn,$q) or die(mysqli_error($conn));
                  echo '<script language="javascript">';
echo 'alert("Details succesfully Updated")';
echo '</script>';
              }
              elseif ($clicked=='Cancel') 
                  {
              
                  }
          }
             }
        ?>
    </body>
</html>
