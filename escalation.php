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
        <title></title>
    </head>
    <body>
        
          
        
            <div class="topnav">
              <ul>
                  <li> <a  href="home.php">Home</a></li>
                  <li class="dropdown"> <a class="active" href="javascript:void(0)" class="dropbtn">Owner</a>
                        <div class="dropdown-content">
                                <a class="active" href="registerowner.php">Register Owner</a>
                                <a href="owneredit.php">Edit Owner Details</a>
                                <a href="registervehicles.php">Register Owner Vehicle(s)</a>
                                <a href="vehicledit.php">Edit Owner Vehicle(s)</a>
                                <a href="qrview.php">Print/View QR Code</a>
                                 <a href="reset.php">Reset Owner Login Password</a>
                        </div>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:void(0)" class="dropbtn">Association</a>
                   <div class="dropdown-content">
                       <a href="registerAssociation.php">Register Association</a>
                                <a href="editAssociation.php">Edit Association Details</a>
                                <a href="reset.php">Reset Association Login Password</a>
                                
                        </div>
                  
                  </li>
                  <li  class="dropdown"> <a href="javascript:void(0)" class="dropbtn">App Content</a>
                  
                    <div class="dropdown-content">
                        <a href="admin/editabout.php">About The App</a>
                        <a href="admin/safetytips.php">Safety Tips</a>
                        <a href="admin/newsletter.php">Newsletters</a>
                        <a href="admin/list.php">Drop Down Lists</a>
                        </div>
                  
                  </li>
                  
                  <li  class="dropdown"> <a href="javascript:void(0)" class="dropbtn">Reports</a>
                  
                    <div class="dropdown-content">
                        <a href="reportedvehicles.php">All Reported Vehicles</a>
                        <a href="repeatoffenders.php">Repeat Offenders</a>
                        <a href="escalation.php">Escalation to Law Enforces</a>
                                
                        </div>
                  
                  </li>
 </ul>


       
   <div class="header">
     <img src="images/logo.png" alt="Logo" height="220" width="620"> 
     <h1>Scholar Transport</h1> 
          </div>                    
<div id="mySidenav" class="sidenav">
    
    <h2 style="color: #BB5E0A; border: #ffffff"></br></br></br></br></br></br></br></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quicklink's</h2>
<a  href="registerowner.php">Register Owner</a>
  <a href="registerAssociation.php">Register Association</a>
  <a href="reset.php">Reset User Password</a>
  <a href="login.php">Logout</a>

</div>
    </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
