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
        <title>Register Transport Association</title>
     
    </head>
          <style>
            
            .topnav {
     list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    position: relative;
    width: 100%;
    background-color: #D4AF37;
}
.topnav a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    position: relative;
    width: 100%;
    background-color: #D4AF37;
}

li {
    float: left;
    
}

li a {
    display: block;
    
    color: white;
    text-align: center;
    padding: 14px 16px ;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #BB5E0A;
}

.active
{
    background-color: #073D85;
}

.dropdown {
    float: left;
    overflow: hidden;
}
 .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
   
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.topnav a:hover, .dropdown:hover .dropbtn {
    background-color: #333;
}



.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
   float: none;
    color: whitesmoke;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #BB5E0A}

.dropdown:hover .dropdown-content {
    display: block;
}

        </style>
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
        <?php
    
    
         // define variables and set to empty values
       
        $typeErr= $surnameErr = $nameErr = $idErr = $emailErr= $passportErr = $genderErr = $websiteErr=$noErr =$addressErr = "";
        $assName = $alt =$no= $address= $resp =  $respS= $name = $officeNo = $email = $remail= $phone  = "";
      
        
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            
                 
                 
                 
          
            $assName = $_POST['assName'];
            $email = $_POST['email'];
            
   
                                $conn = mysqli_connect("localhost","root","","dbScholar") or die("Error connecting");
                                    $q = "INSERT INTO `user`( `username`, `password`) VALUES ('".$email."','password')";
                                    mysqli_query($conn,$q) or die(mysqli_error($conn));
                                    $last_id = mysqli_insert_id($conn);
		   $q="INSERT INTO `association`(`Name`, `Address`, `ContactName`, `ContactSurname`, `OfficeNo`, `CellNo`, `AltNo`, `Email`, `UserID`) VALUES ('".$assName."','".$address."','".$resp."','".$respS."','".$officeNo."','".$phone."','".$alt."','".$email."',".$last_id.")";
                       mysqli_query($conn,$q) or die(mysqli_error($conn));
                    $_SESSION['assID']    = mysqli_insert_id($conn); 
                       
                           echo "<p>Association has been registered</p>";
                         mysqli_close($conn);
 
            
            
          
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
       
  
	<div  class="ownerReg">	
      <h2>Transport Association Registration</h2>
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <br><br><br><br><br><br> <span class = "error">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Required Fields.</span></p>
      
      <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
               
            <tr>
               <td>*Association Name:</td>
               <td><input type = "text" name = "assName" maxlength="13">
                  <span class = "error"> <?php echo $idErr;?></span>
               </td>
            </tr>
                        <tr>
               <td>*Physical Address:</td>
               <td> <input type = "text" name = "address">
                  <span class = "error"><?php echo $addressErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>*Person Responsible Name: </td>
               <td><input type = "text" name = "resp">
                  <span class = "error"><?php echo $passportErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>*Person Responsible Surname:</td>
               <td> <input type = "text" name = "respS">
                  <span class = "error"><?php echo $nameErr;?></span>
               </td>
            </tr>
            
           <tr>
               <td>*Office Number:</td>
               <td> <input type = "phone" name = officeNo">
                  <span class = "error"><?php echo $surnameErr;?></span>
               </td>
            </tr>
         
    
      
            
                <tr>
               <td>*Cellphone Number:</td>
               <td> <input type = "phone" name = "phone">
                  <span class = "error"><?php echo $noErr;?></span>
               </td>
            </tr>
            
            
                <tr>
               <td>*Alternative Cellphone Number:</td>
               <td> <input type = "phone" name = "alt">
                  <span class = "error"><?php echo $noErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>*Email Address: </td>
               <td><input type = "email" name = "email">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
                <tr>
               <td>*Re-enter Email Address: </td>
               <td><input type = "email" name = "remail">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
         
            
         </table>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "submit" name = "submit" value = "Submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "submit" name = "cancel" value = "Cancel"> 
      </form>
      
       </div>
       
 
       
       

      
      
       
   </body>
   
    </body>
</html>
