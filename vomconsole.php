
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
        <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
     <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <title>Vehicle Owner Management Console</title>

    </head>
    <body   >

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

     <div style="margin-top: 50px">

         <a href="home.php"><img src="images/home.png" alt="Home" width="50px" height="50px"  > </a>
     <br>
     <div id="popular-req" class="popular-req"style="border: #073D85;border-style: inset;">
         <h3 style="border: #073D85;border-style:solid;text-align: center;margin-top: 0px;margin-left: 0px" >Requests</h3>
         <div class="row">
             <img src="images/req.png">  <a  href="registerowner.php">Register Owner</a><br>
             <img src="images/req.png"><a href="owneredit.php">Edit Owner Details</a><br>
             <img src="images/req.png"> <a href="registervehicles.php">Register Owner Vehicle(s)</a><br>
             <img src="images/req.png"> <a href="vehicledit.php">Edit Owner Vehicle(s)</a><br>
             <img src="images/req.png"> <a href="qrview.php">Print/View QR Code</a><br>
             <img src="images/req.png"> <a href="reset.php">Reset Owner Login Password</a><br>

         </div>

     </div>

     </div>
    </body>
</html>


