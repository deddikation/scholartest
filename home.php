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
        <title>Home</title>
  
    </head>
    <body style="padding-left: 15em; padding-right: 15em;width: 70%" >


            <div id="header-home" class="header-home" >


                <h1>&nbsp; Scholar Transport Incident Management</h1>
                <?php

                echo "<h3>Welcome, &nbsp;".$_SESSION['UserName']."</h3> &nbsp;"
                ?>

            </div>

<div style="margin-top: 150px">

            <div id="links" class="links"style="border: #073D85;border-style: inset;">
                <h3 style="border: #073D85;border-style:solid;text-align: center;margin-top: 0px" >Links</h3>


                <div>

                    <a href="incidentconsole.php" target="_blank">Incident Management Console</a><br><br>
                    <a href="vomconsole.php" target="_blank">Vehicle Owner Management Console</a><br><br>
                    <a href="amconsole.php" target="_blank">Association Management Console</a><br><br>
                    <a href="incidentconsole.php" target="_blank">Vehicle Escalation Console</a><br><br>
                    <a href="incidentconsole.php" target="_blank">App Management Console</a><br><br>
                    <a href="incidentconsole.php" target="_blank">Newsletter Console</a><br><br>
                    <a href="incidentconsole.php" target="_blank">Safety Tips Console</a><br><br>
                    <a href="incidentconsole.php" target="_blank">Reports Console</a><br>
                </div>

            </div>

            <div id="hint-slide" class="hint-slide">


<img src="images/demo.png">


            </div>




    <div id="newsletters" class="newsletters"style="border: #073D85;border-style: inset;">
        <h3 style="border: #073D85;border-style:solid;text-align: center;margin-top: 0px" >Newsletters</h3>

            <div class="leftcolumn">
                <div class="card">
                    <h5>TITLE HEADING</h5>
                    <h5>TITLE HEADING</h5>
                    <h5>TITLE HEADING</h5>
                    <h5>TITLE HEADING</h5>
                    <h5>TITLE HEADING</h5>

                    <!--       <h5>Title description, Dec 7, 2017</h5>
                           <div class="fakeimg" style="height:200px;">Image</div>
                           <p>Some text..</p>
                           <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                      --> </div>
                   </div>
           </div>

              <div id="popular-req" class="popular-req"style="border: #073D85;border-style: inset;">
                  <h3 style="border: #073D85;border-style:solid;text-align: center;margin-top: 0px;margin-left: 0px" >Popular Requests</h3>
                  <div class="row">
                      <img src="images/req.png"> <a  href="registerowner.php" target="_blank">Register Owner</a><br>
                      <img src="images/req.png"><a href="registervehicles.php" target="_blank">Register Owner Vehicle(s)</a><br>
                      <img src="images/req.png"> <a href="reset.php" target="_blank">Reset Owner Login Password</a><br>
                      <img src="images/req.png"> <a href="registerAssociation.php" target="_blank">Register Association</a><br>
                      <img src="images/req.png"> <a href="admin/safetytips.php" target="_blank">Safety Tips</a><br>
                      <img src="images/req.png"> <a href="admin/newsletter.php" target="_blank">Newsletters</a><br>
                      <img src="images/req.png"> <a href="incidentconsole.php" target="_blank">All Reported Vehicles</a><br>
                      <img src="images/req.png"> <a href="repeatoffenders.php" target="_blank">Repeat Offenders</a><br>
                      <img src="images/req.png"> <a href="escalation.php" target="_blank">Escalation to Law Enforces</a>

                  </div>

              </div>

</div>
           </body>
       </html>
