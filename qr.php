<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
        <title>Vehicle QR Code</title>
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
        session_start();
        echo "<h3>Welcome, &nbsp;".$_SESSION['UserName']."</h3> &nbsp;"
        ?>


    </div>


        <?php
         include 'Vehicle.php';

         
         include('phpqrcode/qrlib.php'); 
    include('config.php'); 
    
    
     $ListOfObjects = $_SESSION['vehicles'] ;

    

    // how to build raw content - QRCode with simple Business Card (VCard) 
     
    //$tempDir = EXAMPLE_TMP_SERVERPATH; 
     
    
     foreach ($ListOfObjects as $page)
                        {
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
    QRcode::png($codeContents, "1".'025.png', QR_ECLEVEL_L, 3); 
    
    // displaying 
    echo '<h3>Approved Scholar Transport</h3><br>';
                        echo '<img src="'."1".'025.png" /><br>';
                        echo '<img src="images/logoc.png" />';
                        
                        echo "</div>";
                        echo "<input type='Button'  value = 'Print'onclick='printDiv('printableArea')> ";
                            echo '<script language="javascript">';
                            echo 'alert("Registration has been completed!")';
                            echo '</script>';

                        }
         // put your code here
        ?>
    </body>
</html>
