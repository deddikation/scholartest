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
        <title>Print QR Code</title>
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

        <br><br>
        <div class="ownerReg">
	
      <h2>Search For Vehicle</h2>
      
           <br><br>
       <div class="ownerEdit">  
           <form method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td >Vehicle Registration Number:</td>  <input type = "text" name = "searchname" maxlength="13"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/search.png" name="search" value="tr" alt="search"width="30" height="29">
           </form>
          <br></div>
      
    <!-- 
    
      -->
    
       
 </div>

        <?php
         include 'config.php';
         include 'Vehicle.php';
         include('phpqrcode/qrlib.php'); 
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
             {
                      if(isset($_POST['search']))
         {
             
              if($_POST['searchname'] != "")
             {
             $q = "Select * FROM vehicle WHERE RegNo like '".$_POST['searchname']."'";
      
             $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
            
              $row=mysqli_fetch_assoc($result);
                
              $page = new Vehicle($row['Type'], $row['VINNo'], $row['RegNo'], $row['LRWTestDate'], $row['NRWTestDate'],$row['AssociationID'],$row['ToRoute'],$row['FromRoute'],$row['DriverName'],$row['DriverPDPNo']);
       echo '<script>function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>';
                        echo "<div id='printableArea' style='border: 5px solid ;width=200px; padding: 5px;margin: 5px;'>";
     
    // we building raw data 
    $codeContents  = 'Vehicle Details'."\n".'Type:'; 
    $codeContents .= 'Type:'.$page->getType()."\n"; 
    $codeContents .= 'Registration Number:'.$page->getRegNo()."\n"; 
    $codeContents .= 'Roadworthy: Yes'; 
     
    // generating 
    QRcode::png($codeContents, $page->getRegNo().'.png', QR_ECLEVEL_L,8); 
    
    // displaying 
    echo '<h3>Approved Scholar Transport</h3><br>';
                        echo '<img src="'.$page->getRegNo().'.png" /><br>';
                        echo '<img src="images/logo.png" />';
                        
                        echo "</div>";
                        echo "<input type='Button'  value = 'Print'onclick='printDiv('printableArea')> ";
         }else
         {
                        echo '<script language="javascript">';
echo 'alert("No Vehicle Registration Number Entered '.$_POST['searchname'].' , Try again")';
echo '</script>';
         } 
         }
         
         
            }
        ?>
    </body>
</html>
