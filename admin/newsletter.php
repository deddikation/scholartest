<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link href="../CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
        <title>Upload Newsletter</title>
    </head>
    <body>
        
      
               <div class="header">
             <img src="../images/logo.png" alt="Logo" > 
     <h1>Scholar Transport</h1> 
          </div></br>
 <div class="topnav">
              <ul>
                  <li> <a  href="../home.php">Home</a></li>
                  <li class="dropdown"> <a  href="javascript:void(0)" class="dropbtn">Owner</a>
                        <div class="dropdown-content">
                                <a  href="../registerowner.php">Register Owner</a>
                                <a  href="../owneredit.php">Edit Owner Details</a>
                                <a  href="../registervehicles.php">Register Owner Vehicle(s)</a>
                                <a href="../vehicledit.php">Edit Owner Vehicle(s)</a>
                                <a href="../qrview.php">Print/View QR Code</a>
                                 <a href="../reset.php">Reset Owner Login Password</a>
                        </div>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:void(0)" class="dropbtn">Association</a>
                   <div class="dropdown-content">
                       <a href="../registerAssociation.php">Register Association</a>
                                <a href="../editAssociation.php">Edit Association Details</a>
                                <a href="../reset.php">Reset Association Login Password</a>
                                
                        </div>
                  
                  </li>
                  <li  class="dropdown"> <a class="active" href="javascript:void(0)" class="dropbtn">App Content</a>
                  
                    <div class="dropdown-content">
                        <a href="editabout.php">About The App</a>
                        <a   href="safetytips.php">Safety Tips</a>
                        <a class="active" href="newsletter.php">Newsletters</a>
                        <a href="list.php">Drop Down Lists</a>
                        </div>
                  
                  </li>
                  
                  <li  class="dropdown"> <a href="javascript:void(0)" class="dropbtn">Reports</a>
                  
                    <div class="dropdown-content">
                        <a href="../reportedvehicles.php">All Reported Vehicles</a>
                        <a href="../repeatoffenders.php">Repeat Offenders</a>
                        <a href="../escalation.php">Escalation to Law Enforces</a>
                                
                        </div>
                  
                  </li>
 </ul>
  <br><br><br>
</div>
        
        
         <div class="ownerReg">
          
        
        <form action="" method="post" enctype="multipart/form-data" name="form1">
<input type="file" name="resume" id="resume">
<input type="submit" name="SubmitBtn" id="SubmitBtn" value="Upload Newsletter">
        </form> </div>
   <?php
if(isset($_POST["SubmitBtn"])){

  $fileName=$_FILES["resume"]["name"];
  $fileSize=$_FILES["resume"]["size"]/1024;
  $fileType=$_FILES["resume"]["type"];
  $fileTmpName=$_FILES["resume"]["tmp_name"];  

  if($fileType=="application/msword"){
    if($fileSize<=200){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="upload/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
    }
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  }
  else{
    echo "You can only upload a Word doc file.";
  }  
}
?> 
    </body>
</html>
